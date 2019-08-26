# Simple PHP OAuth Github App

This project shows how to make [OAuth connection](https://developer.github.com/apps/building-oauth-apps/authorizing-oauth-apps/) between your app and Github.

## Installation

1. Clone this repo:

```
git clone git@github.com:yesnik/php-oauth-github.git
```

2. Run dev server:

```
cd php-oauth-github
php -S 127.0.0.1:8000
```

3. Open link in your browser: http://127.0.0.1:8000 and follow instructions.

## Create your own OAuth App

We registered OAuth application under our Github account and named it "PHP OAuth Github".

You can register your own app and place its credentials under `config.php`. Registration of new OAuth app is located at [Settings / Developer settings](https://github.com/settings/developers). Just press button "New OAuth app".

## Contribution

If you have ideas to improve this repo, open pull request or create an issue.
