# Reference Links
* https://www.mediawiki.org/wiki/Manual:Upgrading
* https://www.mediawiki.org/wiki/Manual:Configuration_settings
* https://www.mediawiki.org/wiki/Manual:Backing_up_a_wiki
* https://www.mediawiki.org/wiki/Manual:DumpBackup.php

# Backup steps
1. export BACKUP_DIR=/path/to/backup/dir
2. export WIKI_PATH=/path/to/the/root/dir/containing/mediawiki
3. Turn your wiki to read only by uncommenting
   `#$wgReadOnly = 'Site Maintenance';` that is found at the end of
   LocalSettings.php
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

8. Comment `$wgReadOnly = 'Site Maintenance';`

# Update Steps
  See https://www.mediawiki.org/wiki/Manual:Upgrading#Unpack_the_new_files
  and following sections. In addition see the comments starting with `TODO` and
  `NOTE` in LocalSettings.php in this repo, as the deployed one might not have
  all the comments.

# Skin Used
  https://github.com/figure002/cavendishmw

# Extensions in use
  See http://wiki.opencog.org/w/Special:Version for the list. Also see
  http://wiki.opencog.org/w/Special:MathStatus for the status of the
  Math extension.
