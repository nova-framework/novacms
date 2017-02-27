<?php
echo "user id, Title, Link, Reference id, Section, Type, Source, Date Created\n";
if ($logs) {
    foreach ($logs as $log) {
        echo "$log->user_id, $log->title, $log->link, $log->refID, $log->section, $log->type, $log->source, $log->created_at\n";
    }
}
