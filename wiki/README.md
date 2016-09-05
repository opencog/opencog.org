# Reference Links
https://www.mediawiki.org/wiki/Manual:Upgrading
https://www.mediawiki.org/wiki/Manual:Configuration_settings
https://www.mediawiki.org/wiki/Manual:Backing_up_a_wiki
https://www.mediawiki.org/wiki/Manual:DumpBackup.php

# Backup steps
1. export BACKUP_DIR=/path/to/backup/dir
2. export WIKI_PATH=/path/to/the/root/dir/containing/mediawiki
3. Turn your wiki to read only by adding `$wgReadOnly = 'Site Maintenance';`
   to LocalSettings.php.
4. mkdir -p $BACKUP_DIR/$(date +'%F')
5. Database backup
    ```
    mysqldump -u opencog_media -B opencog_mediawik -p | bzip2 -c \
        > $BACKUP_DIR/$(date +'%F')/opencog-mediawiki-database-$(date +'%F').sql.bz2
    ```
6. XML dump of wiki
    ```
    cd $WIKI_PATH/wikihome/maintenance
    php -d error_reporting=E_ERROR dumpBackup.php --full | bzip2 -c \
        > $BACKUP_DIR/$(date +'%F')/opencog-mediawiki-xml-full-dump-$(date +'%F').xml.bz2
    ```
7. Wiki directory contents.
    ```
    cd $WIKI_PATH
    cd ..
    tar --exclude-vcs -cvjf \
        $BACKUP_DIR/$(date +'%F')/opencog-mediawiki-wiki-root-dir-$(date +'%F').tar.bz2 wiki
    ```
8. Remove `$wgReadOnly = 'Site Maintenance';` from LocalSettings.php

# Update Steps
...
