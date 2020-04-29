############################################################################################
# setup.sh
############################################################################################
cd ../var/www/app/
# envファイルの作成
cp -f .env.example .env
# composer install
composer install
# key generate
php artisan key:generate
