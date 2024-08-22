## HearYe

An announcements board made with Laravel and Vue.js

---
## Requirements

### Frontend:
* The frontend framework should be the latest version of React or Vue.
* Over time there will be a lot of announcements so the app will need to handle paging over the data so that only a subset is retrieved and displayed at a time.
* The announcement should contain an author, a date, and the body defined in Markdown syntax.
* The page should render the announcement bodies in HTML with standard features such as hyperlinks working.
* You may use whatever tools and libraries you like, but make sure the result is something that we can run on our machine directly.
* Comment your code thoroughly

### Backend:
* Create a backend to feed announcements to your application
* This backend should be built with Laravel or Lumen
* Be sure to showcase your knowledge of Laravel’s design patterns
* You may pull in any packages or use any tools you deem useful for the mission
* Comment your code thoroughly

---

## Setup and Build

I used Sail/Docker containers, so Docker will need to be installed.

It's probably worth mentioning that you may need to set the owner to the `hearye` directory on your machine if you're running into any permission issues (I'm using Pop-OS, so I always have to do this anytime I install Laravel):
```shell
sudo chown -R [your_user_name] /hearye
```

Bring up the containers in the background using Sail (be sure to be in the project root directory)
```shell
./vendor/bin/sail up -d
```

Then you'll need to run the migrations with Artisan:
```shell
./vendor/bin/sail artisan migrate
```
If you run into any permission errors here, in the `.env` changing `DB_USERNAME` to `root` should fix it.

Then you should be able to navigate to `http://localhost/` and see the application

You shouldn't have to build the FE components, but just in case you're running into a blank screen you can:
1) Build the assets
```shell
 ./vendor/bin/sail npm run build
```
2) ...or as a last resort, bring up Vite
```shell
 ./vendor/bin/sail npm run dev
```
