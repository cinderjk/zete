
![Logo](https://user-images.githubusercontent.com/85218269/204297488-b37d1b48-3074-4758-b2eb-fca32f2729b8.png)


# Zete-Panel for WhatsApp API

Zete-Panel, is an open-source application interface for this 
[ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api) with laravel/livewire and you can install it on any Shared Hosting that support NodeJs and SSH
## Features

- Auto-refreh QR Code
- Connect/Disconnect Device
- Message Log
- Send test Message
- Change Profile (Name)
- Regenerate API Key
- Built-in API with Documentation
- Use sanctum for API Token
- Ready-to-use


## Installation on Shared Hosting

### First you need to Setup the API.


1. Create a new subdomain, e.g. example.yourdomain.com
2. Open the terminal or SHH to start cloning this repository to your subdomain directory
```bash
git clone https://github.com/ookamiiixd/baileys-api.git public_html/example.yourdomain.com
```
3. Enter to the subdomain directory.
```bash
cd public_html/example.yourdomain.com
```
4. Install the dependencies
```bash
yarn install
```
or
```bash
npm install
```
5. Open file manager and edit the .env
```bash
HOST=127.0.0.1
PORT=48000
MAX_RETRIES=5
RECONNECT_INTERVAL=5000
```

#### Note:
##### HOST:  don't change it
##### PORT: use any port 48000 - 49000
#
6. Create .htaccess file, and copy these
```bash
Options +FollowSymLinks -Indexes
IndexIgnore *
DirectoryIndex
<IfModule mod_rewrite.c>
RewriteEngine on
# Simple URL redirect:
RewriteRule ^(.*)$ http://127.0.0.1:48000/$1 [P]
</IfModule>
```

Next step edit whatsapp.js, and uncomment line:71, and save it
```bash
69| const requiresPatch = !!(
70|     message.buttonsMessage ||
71|     // message.templateMessage || 
72|     message.listMessage
73| );
```
to
```bash
69| const requiresPatch = !!(
70|     message.buttonsMessage ||
71|     message.templateMessage || 
72|     message.listMessage
73| );
```
7. Go to "Setup Node.js App", follow these settings, and Create
```bash
Node.js version = v16 above
Application mode = Production
Application root = public_html/example.yourdomain.com
Application URL = example.yourdomain.com
Application startup file = app.js
```
8. Copy the virtual environment path, open your terminal or SSH, paste it, and Enter
```bash
source /home/u123456/nodevenv/public_html/example.yourdomain.com/16/bin/activate && cd /home/u123456/public_html/example.yourdomain.com
```
9. Install pm2
```bash
npm install pm2@latest -g
```
or
```bash
yarn global add pm2
```
10. Run the app.js
```bash
npx pm2 start app.js
```

Your API is ready, give it a try here => [DOCS](https://documenter.getpostman.com/view/18988925/UVeNni36)


### Install Zete-Panel
1. Create a new domain, e.g. yourdomain.com
2. Open the terminal or SHH to start cloning this repository to your domain directory
```bash
git clone https://github.com/cinderjk/zete.git public_html/yourdomain.com
```
3. Enter to the domain directory.
```bash
cd public_html/yourdomain.com
```
4. Install the dependencies
```bash
composer i
```
4. Create a Database
5. Open file manager and edit the .env
```bash
APP_NAME=Zete
APP_ENV=local
APP_KEY=base64:oLpa/yTwIUUiFoPg5A17Ao15djIt6d4SOwUvdZyp5QZ=
APP_DEBUG=false
APP_URL=http://zete.live
WA_API_URL=http://example.yourdomain.com
USE_JOB_QUEUE=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

#### Note:
##### WA_API_URL:  change it to your API endpoint
##### USE_JOB_QUEUE: if you enable it, you will need a cron job to run these commands
```bash
*/5	*	*	*	*	/usr/local/bin/php /home/u123456/public_html/yourdomain.com/artisan queue:work --max-time=300 >> /dev/null 2>&1
```
6. Run migration and key:generate, simply just
```bash
php artisan fresh:data
```
or
```bash
php artisan migrate:fresh --seed & php artisan key:generate
```
7. Create .htaccess file, and copy these
```bash
RewriteEngine on
RewriteCond %{REQUEST_URI} !^public
RewriteRule ^(.*)$ public/$1 [L]
```
8. Go to yourdomain.com
9. Login use username admin & 123
10. Go to Device > Add, and create new Device
11. Scan the QR with your whatsapp
12. Next, go to Messages > Add, and test it.
## Support

For support, email fake@fake.com or join our Slack channel.


## Screenshots

### Login Page
![Login Page](https://user-images.githubusercontent.com/85218269/204294710-00ce9f1c-5d94-45d7-ae26-dc4d44e418d3.png)
### Dashboard 
![Dashboard Page](https://user-images.githubusercontent.com/85218269/204294883-178049c6-34e5-4011-b9ef-7dd7ab4c16d2.png)
### Devices 
![Devices Page](https://user-images.githubusercontent.com/85218269/204295032-ee69badf-99e7-4adc-90ba-6a22490f7f2a.png)
### Scan Devices 
![Scan Devices Page](https://user-images.githubusercontent.com/85218269/204295311-7cc517bd-1bd7-4129-8e9b-049f579c535e.png)
### Add Message 
![Add Message Page](https://user-images.githubusercontent.com/85218269/204295909-118da08f-e174-44b4-ae75-47b9487efc0e.png)
### Profile
![Profile Page](https://user-images.githubusercontent.com/85218269/204298772-802f8934-ea9a-4c4d-b19a-c633d65d847e.png)
### Docs
![Docs Page](https://user-images.githubusercontent.com/85218269/204299252-841f55c8-caa3-4517-a076-5a29a6595788.png)


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Tech Stack

**Client:** Livewire, Bootstrap

**Server:** NodeJs, Laravel

## Credit
- Baileys API: [ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api)
- Admin Template: [Now UI Dashboard](https://www.creative-tim.com/product/now-ui-dashboard)