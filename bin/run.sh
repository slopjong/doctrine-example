#!/bin/bash

case "$(uname)" in
    Darwin)

        if [ -z $(command -v greadlink) ]
        then
            echo "Please install greadlink first. Run 'brew install coreutils'"
            exit
        fi

        READLINK="greadlink"
        ;;
    *)
        READLINK="readlink"
esac

SCRIPT=$(${READLINK} -f $0)
SCRIPTPATH=`dirname $SCRIPT`

cd $SCRIPTPATH/..

# create a sample database
sqlite3 db.sqlite  "create table test (id INTEGER PRIMARY KEY,f TEXT,l TEXT);"

# create a temporary cli config
ln -s bin/cli-config.php

vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

# remove the config
rm cli-config.php
