apidoc -i ./ -e ./node_modules/  -o ../events_app_api_doc/
java -jar schemaspy-6.0.0-rc2.jar -t pgsql -db events_app -u paulolorenzobasilio -host 127.0.0.1 -o events_app_schema -schemas "public,event,organiser,users" -dp postgresql.jar

--svn ignore like gitignore
svn propset svn:ignore -RF /root/svn-ignore.txt .

--add all files to commit--
svn status | grep '?' | sed 's/^.* /svn add /' | bash

--undo add file before commit--
svn revert --recursive folder_name