<p align="center"><a href="https://github.com/cinderjk/zete" target="_blank"><img src="https://user-images.githubusercontent.com/85218269/204297488-b37d1b48-3074-4758-b2eb-fca32f2729b8.png" width="200" alt="Zete Logo"></a></p>

# Zete-Panel for WhatsApp API

[![Tests](https://github.com/cinderjk/zete/actions/workflows/laravel.yml/badge.svg)](https://github.com/cinderjk/zete/actions/workflows/laravel.yml)

Zete-Panel, is an open-source application interface for this
[ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api/tree/1.0.0-beta.0) with laravel/livewire and you can install it on any Shared Hosting that support NodeJs and SSH

## Features

-   Auto-refreh QR Code
-   Connect/Disconnect Device
-   Message Log
-   Send test Message
-   Change Profile (Name)
-   Regenerate API Key
-   Built-in API with Documentation
-   Use sanctum for API Token
-   Ready-to-use

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
4. Setup configuration

#### Create a database for ookamiiiixd/baileys-api as it is needed for data storage

Then copy the .env from .env.example
```bash
cp .env.example .env
```

then edit the .env file, you can use nano with the command

```bash
nano .env
```
Paste this

```env
# Listening Host
HOST="127.0.0.1"

# Listening Port
PORT="48000"

# Database Connection URL
# mysql://{db_username}:{db_password}@127.0.0.1:3306/{db_name}
DATABASE_URL="mysql://root:12345@127.0.0.1:3306/baileys_api"

# Reconnect Interval (in Milliseconds)
RECONNECT_INTERVAL="5000"

# Maximum Reconnect Attempts
MAX_RECONNECT_RETRIES="5"

# Maximum SSE QR Generation Attempts
SSE_MAX_QR_GENERATION="10"

# Pino Logger Level
LOG_LEVEL="warn"
```

5. Create .htaccess file, and copy these

```bash
Options +FollowSymLinks -Indexes
IndexIgnore *
DirectoryIndex
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule ^(.*)$ http://127.0.0.1:48000/$1 [P]
</IfModule>
```


6. Go to "Setup Node.js App", follow these settings, and Create

```bash
Node.js version = v16 above
Application mode = Production
Application root = public_html/example.yourdomain.com
Application URL = example.yourdomain.com
Application startup file = app.js
```

7. Copy the virtual environment path, open your terminal or SSH, paste it, and Enter

```bash
source /home/u123456/nodevenv/public_html/example.yourdomain.com/16/bin/activate && cd /home/u123456/public_html/example.yourdomain.com
```
8. Install the dependencies

```bash
yarn install
```

or

```bash
npm i
```

9. Build the project
```bash
yarn build
```
or
```sh
npm run build
```

10. Push the schema

```sh
npx prisma db push
```

11. Install pm2

```bash
npm install pm2@latest -g
```

or

```bash
yarn global add pm2
```

12. Run the app.js

```bash
npx pm2 start app.js
```
13. Now the endpoint should be available according to your environment variables configuration. Default is at `http://example.yourdomain.com`
Your API is ready, give it a try here => [DOCS](https://documenter.getpostman.com/view/18988925/2s8Z73zWbg)

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

4. Create a new Database
5. Open file manager and edit the .env

```bash
APP_NAME=Zete
APP_ENV=local
APP_KEY=base64:oLpa/yTwIUUiFoPg5A17Ao15djIt6d4SOwUvdZyp5QZ=
APP_DEBUG=false
APP_URL=http://yourdomain.com
WA_API_URL=http://example.yourdomain.com
USE_JOB_QUEUE=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_zete_database
DB_USERNAME=your_zete_database_username
DB_PASSWORD=your_zete_database_password
```

#### Note:

##### WA_API_URL: change it to your API endpoint

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

## Tech Stack

**Client:** Livewire, Bootstrap

**Server:** NodeJs, Laravel

## Credit

-   Baileys API: [ookamiiixd/baileys-api](https://github.com/ookamiiixd/baileys-api)
-   Admin Template: [Now UI Dashboard](https://www.creative-tim.com/product/now-ui-dashboard)
-   Help me improve this projects: [Saweria](https://saweria.co/cinderjk)
