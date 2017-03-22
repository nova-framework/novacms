<?php
namespace Shared\Commands;

use Nova\Console\Command;
use Nova\Support\Str;
use Nova\Helpers\ReservedWords;

class MakeCmsModuleCommand extends Command
{
    /**
     * The name of the console command.
     *
     * @var string
     */
    protected $name = 'make:cms:module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new CMS Module';

    /**
     * Array to store the configuration details.
     *
     * @var array
     */
    protected $container = array();

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->container['name'] = null;
        $this->container['modal'] = null;

        $this->stepOne();
    }

    /**
     * Step 1: Configure module manifest.
     *
     * @return mixed
     */
    private function stepOne()
    {
        $this->container['name'] = ucwords($this->ask('Please enter the name of the module:'));
        $this->container['modal'] = ucwords($this->ask('Please enter the name for the modal:'));

        if (Str::length($this->container['name']) == 0) {
            $this->error("\nModule name cannot be empty.");
        } elseif (Str::length($this->container['modal']) == 0) {
            $this->error("\nModal name cannot be empty.");
        } else {

            $this->comment('You have provided the following manifest information:');

            $this->comment('Name:  '.$this->container['name']);
            $this->comment('Modal: '.$this->container['modal']);

            if ($this->confirm('Do you wish to continue?')) {
                $this->generate();
            } else {
                return $this->stepOne();
            }

        }

        return true;
    }

    protected function generate()
    {
        $error = null;

        if (in_array(strtolower($this->container['name']), ReservedWords::getList())) {
            $this->error("\nModule name cannot be a reserved word.");
            $error = true;
        }

        if (file_exists('app/Modules/'.$this->container['name'])) {
            $this->error("\nModule ".$this->container['name']." already exists.");
            $error = true;
        }

        if ($error == true) {
            exit;
        }

        //make a copy of the module
        $this->recurseCopy('shared/BaseTemplates/Modules/BaseModule', 'app/Modules/'.$this->container['name']);

        // rename file / folders to new module name
        $newpath = 'app/Modules/'.$this->container['name'].'/';
        // $this->rename('Controllers/BaseModule.php', 'Controllers/'.$this->container['name'].'.php', $newpath);
        $this->rename('Models/BaseModule.php',      'Models/'.$this->container['modal'].'.php',      $newpath);
        // $this->rename('Views/BaseModule',           'Views/'.$this->container['name'],              $newpath);


        /*
        Key:

        BaseModuleController = controller name
        BaseModuleModal      = model name
        BaseModuleTitle      = space seperated title
        BaseModuleModalTitle  = space seperated title
        BaseModuleSlug       = no spaces slug from title
        */

        //rename contents to replace BaseModule with the new name
        $this->renameString($newpath.'Controllers/Admin.php', 'BaseModuleController',  $this->container['name']);
        $this->renameString($newpath.'Controllers/Admin.php', 'BaseModuleModal',       $this->container['modal']);
        $this->renameString($newpath.'Controllers/Admin.php', 'BaseModuleTitle',       $this->container['name'], 'title');
        $this->renameString($newpath.'Controllers/Admin.php', 'BaseModuleSlug',        $this->container['name'], 'slug');

        $this->renameString($newpath.'Models/'.$this->container['modal'].'.php',      'BaseModuleController', $this->container['name']);
        $this->renameString($newpath.'Models/'.$this->container['modal'].'.php',      'BaseModuleModal',      $this->container['modal']);

        $this->renameString($newpath.'Providers/EventServiceProvider.php',    'BaseModuleController',         $this->container['name']);
        $this->renameString($newpath.'Providers/ModuleServiceProvider.php',   'BaseModuleController',         $this->container['name']);
        $this->renameString($newpath.'Providers/ModuleServiceProvider.php',   'BaseModuleSlug',               $this->container['modal'], 'slug');
        $this->renameString($newpath.'Providers/RouteServiceProvider.php',    'BaseModuleController',         $this->container['name']);

        $this->renameString($newpath.'Views/Admin/Create.tpl', 'BaseModuleTitle',      $this->container['name'], 'title');
        $this->renameString($newpath.'Views/Admin/Create.tpl', 'BaseModuleModalTitle', $this->container['modal'], 'title');
        $this->renameString($newpath.'Views/Admin/Create.tpl', 'BaseModuleSlug',       $this->container['name'], 'slug');

        $this->renameString($newpath.'Views/Admin/Edit.tpl', 'BaseModuleTitle',        $this->container['name'], 'title');
        $this->renameString($newpath.'Views/Admin/Edit.tpl', 'BaseModuleModalTitle',   $this->container['modal'], 'title');
        $this->renameString($newpath.'Views/Admin/Edit.tpl', 'BaseModuleSlug',         $this->container['name'], 'slug');

        $this->renameString($newpath.'Views/Admin/Index.tpl', 'BaseModuleTitle',       $this->container['name'], 'title');
        $this->renameString($newpath.'Views/Admin/Index.tpl', 'BaseModuleModalTitle',  $this->container['modal'], 'title');
        $this->renameString($newpath.'Views/Admin/Index.tpl', 'BaseModuleSlug',        $this->container['name'], 'slug');
        $this->renameString($newpath.'Views/Admin/Index.tpl', 'BaseModuleModal',       $this->container['modal'], 'title');

        $this->renameString($newpath.'Views/Admin/Pdf.tpl', 'BaseModuleTitle',         $this->container['name'], 'title');
        $this->renameString($newpath.'Views/Admin/Pdf.tpl', 'BaseModuleSlug',          $this->container['name'], 'slug');

        $this->renameString($newpath.'Events.php', 'BaseModuleTitle', $this->container['name'], 'title');
        $this->renameString($newpath.'Events.php', 'BaseModuleSlug',  $this->container['name'], 'slug');
        $this->renameString($newpath.'Events.php', 'BaseModuleModal',  $this->container['modal'], 'title');

        $this->renameString($newpath.'Routes.php', 'BaseModuleController',  $this->container['name']);
        $this->renameString($newpath.'Routes.php', 'BaseModuleSlug',        $this->container['name'], 'slug');

        //print message
        $this->info("\nModule ".$this->container['name']." created. successfully.");
    }

    private function recurseCopy($src, $dst)
    {
        $dir = opendir($src);
        mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    private function rename($src, $dst, $path)
    {
        rename($path.$src, $path.$dst);
    }

    private function renameString($src, $stringToRename, $newName, $type = null)
    {
        switch ($type) {
            case 'title':
                //split into words based on capital letter
                $parts = preg_split('/(?=[A-Z])/', $newName);
                $newName = implode(' ', $parts);
                $newName = ltrim($newName);
                break;
            case 'slug':
                //make lower case
                $newName = strtolower($newName);
                break;
        }

        $file = file_get_contents($src);
        $file = str_replace($stringToRename, $newName, $file);
        file_put_contents($src, $file);
    }
}
