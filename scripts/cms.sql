# Dump of table nova_global_blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_global_blocks`;

CREATE TABLE `nova_global_blocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_global_blocks` WRITE;
/*!40000 ALTER TABLE `nova_global_blocks` DISABLE KEYS */;

INSERT INTO `nova_global_blocks` (`id`, `title`, `type`, `content`)
VALUES
  (1,'Phone Number','input','123456'),
  (2,'Footer','input',''),
  (3,'Header Nav','input','[main-menu]');

/*!40000 ALTER TABLE `nova_global_blocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_menus`;

CREATE TABLE `nova_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `nova_menus` WRITE;
/*!40000 ALTER TABLE `nova_menus` DISABLE KEYS */;

INSERT INTO `nova_menus` (`id`, `title`, `tag`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`)
VALUES
  (1,'Main Menu','[main-menu]','Bootstrap','[{\"pageid\":1,\"id\":1477730664984,\"slug\":\"/\",\"title\":\"Home\"},{\"pageid\":2,\"id\":1477730664987,\"slug\":\"/about\",\"title\":\"About\"},{\"pageid\":8,\"id\":1477730664991,\"slug\":\"/contact\",\"title\":\"Contact\"}]','2016-10-15 12:12:15','2016-10-29 09:44:25',NULL);

/*!40000 ALTER TABLE `nova_menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_options`;

CREATE TABLE `nova_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_options` WRITE;
/*!40000 ALTER TABLE `nova_options` DISABLE KEYS */;

INSERT INTO `nova_options` (`id`, `group`, `item`, `value`)
VALUES
  (1,'app','name','Nova CMS'),
  (2,'app','color_scheme','blue'),
  (3,'mail','driver','mail'),
  (4,'mail','host',''),
  (5,'mail','port','587'),
  (6,'mail','from.address','admin@novaframework.dev'),
  (7,'mail','from.name','The Nova Staff'),
  (8,'mail','encryption','tls'),
  (9,'mail','username',''),
  (10,'mail','password','');

/*!40000 ALTER TABLE `nova_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_page_blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_page_blocks`;

CREATE TABLE `nova_page_blocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageID` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nova_page_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_page_revisions`;

CREATE TABLE `nova_page_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageID` int(11) DEFAULT NULL,
  `content` text,
  `addedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nova_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_pages`;

CREATE TABLE `nova_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `browserTitle` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `active` varchar(3) DEFAULT 'Yes',
  `content` text,
  `publishedDate` datetime DEFAULT NULL,
  `layout` varchar(255) DEFAULT 'default',
  `sidebars` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_pages` WRITE;
/*!40000 ALTER TABLE `nova_pages` DISABLE KEYS */;

INSERT INTO `nova_pages` (`id`, `browserTitle`, `pageTitle`, `slug`, `active`, `content`, `publishedDate`, `layout`, `sidebars`, `created_at`, `updated_at`, `deleted_at`)
VALUES
  (1,'Home','Home',NULL,'Yes','<p>Hello Right OK!!</p>\r\n','2016-08-01 09:00:00','default',NULL,'2016-08-01 20:11:24','2016-10-15 15:33:04',NULL),
  (2,'About Page','About','about','Yes','<p>About</p>\r\n','2016-08-01 09:00:00','default','1','2016-08-01 20:11:24','2016-08-20 10:59:35',NULL),
  (8,'Contact','Contact','contact','Yes','content','2016-08-03 10:00:00','default',NULL,'2016-08-03 18:20:43','2016-08-03 18:38:45',NULL);

/*!40000 ALTER TABLE `nova_pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_password_reminders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_password_reminders`;

CREATE TABLE `nova_password_reminders` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `email` (`email`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nova_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_roles`;

CREATE TABLE `nova_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `nova_roles` WRITE;
/*!40000 ALTER TABLE `nova_roles` DISABLE KEYS */;

INSERT INTO `nova_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`)
VALUES
  (1,'Root','root','Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.','2016-06-05 01:48:00','2016-06-05 01:48:00'),
  (2,'Administrator','administrator','Full access to create, edit, and update companies, and orders.','2016-06-05 01:48:00','2016-06-05 01:48:00'),
  (3,'Manager','manager','Ability to create new companies and orders, or edit and update any existing ones.','2016-06-05 01:48:00','2016-06-05 01:48:00'),
  (4,'Company Manager','company-manager','Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.','2016-06-05 01:48:00','2016-06-05 01:48:00'),
  (5,'User','user','A standard user that can have a licence assigned to them. No administrative features.','2016-06-05 01:48:00','2016-06-05 01:48:00');

/*!40000 ALTER TABLE `nova_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_sidebars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_sidebars`;

CREATE TABLE `nova_sidebars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `position` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nova_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_users`;

CREATE TABLE `nova_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_users` WRITE;
/*!40000 ALTER TABLE `nova_users` DISABLE KEYS */;

INSERT INTO `nova_users` (`id`, `role_id`, `username`, `password`, `realname`, `email`, `image`, `active`, `activation_code`, `remember_token`, `created_at`, `updated_at`)
VALUES
  (1,1,'admin','$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga','Administrator','admin@novaframework.dev',NULL,1,NULL,'YR64tWZqacO7OsQI04IN0kYuLWvcJQfvE6270lxIWzX22JCYlcv7J40Tbhvm','2016-06-03 10:15:00','2016-10-29 09:36:05');

/*!40000 ALTER TABLE `nova_users` ENABLE KEYS */;
UNLOCK TABLES;
