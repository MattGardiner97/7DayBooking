PATH=/usr/bin

chmod 777 -R /home/ec2-user/repo/Website/storage
rm -f /home/ec2-user/repo/Website/storage/logs/laravel.log

php /home/ec2-user/composer.phar install -d /home/ec2-user/repo/Website
cp /home/ec2-user/.env /home/ec2-user/repo/Website/.env
php /home/ec2-user/repo/Website/artisan key:generate

php /home/ec2-user/repo/Website/vendor/bin/phpunit /home/ec2-user/repo/Website/tests

if [ $? -eq 0 ]
then
    bash /home/ec2-user/repo/Scripts/clean.sh
    bash /home/ec2-user/repo/Scripts/build.sh
fi