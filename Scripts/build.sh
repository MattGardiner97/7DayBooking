php /home/ec2-user/project/Website/artisan down

chmod 777 -R /home/ec2-user/project/Website/storage

php /home/ec2-user/composer.phar install -d /home/ec2-user/project/Website
cp /home/ec2-user/.env /home/ec2-user/project/Website/.env
php /home/ec2-user/project/Website/artisan key:generate

mysql -u root < project/InitialiseDB.sql
php /home/ec2-user/project/Website/artisan migrate
php /home/ec2-user/project/Website/artisan db:seed

php /home/ec2-user/project/Website/artisan up