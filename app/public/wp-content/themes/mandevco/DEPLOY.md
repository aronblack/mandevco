# Mandevco Theme Deployment Guide

This project deploys only the custom WordPress theme folder through GitHub Actions.

## Scope

Only this folder is deployed:
app/public/wp-content/themes/mandevco

The workflow does not deploy plugins, uploads, or the database.

## Prerequisites

1. GitHub repository is connected and pushes to main are working.
2. Hosting SSH access is enabled.
3. Public key is authorized on hosting.
4. GitHub repository secrets are configured.

Required secrets:
- DEPLOY_SSH_KEY
- DEPLOY_HOST
- DEPLOY_PORT
- DEPLOY_USER
- DEPLOY_PATH

Current production host values used in this project:
- DEPLOY_HOST: 198.38.90.26
- DEPLOY_PORT: 22
- DEPLOY_USER: mandevco1
- DEPLOY_PATH: /var/www/a7900026-4af5-4f08-83cd-72c309a72fba/public_html/wp-content/themes/mandevco

## Workflows

Deploy workflow file:
.github/workflows/deploy-theme.yml

Rollback workflow file:
.github/workflows/rollback-theme.yml

## Normal Deployment

Automatic deploy happens when code is pushed to main and files under the theme path change.

Manual deploy:
1. Open GitHub repository.
2. Go to Actions.
3. Open Deploy WordPress Theme.
4. Click Run workflow.
5. Select main branch and run.

## Deployment Verification

The deploy workflow writes a version marker file to production:
wp-content/themes/mandevco/version.txt

Open this URL after each deploy:
https://mandevco.com/wp-content/themes/mandevco/version.txt

Confirm:
- commit value matches expected commit SHA
- deployed_at_utc is recent
- workflow_run is the expected run id

## Rollback

Manual rollback steps:
1. Open GitHub repository.
2. Go to Actions.
3. Open Rollback WordPress Theme.
4. Click Run workflow.
5. Enter a previous commit SHA.
6. Run workflow.

After completion, verify version.txt again.
The file includes deploy_type=rollback.

## Safe Release Checklist

1. Confirm local changes are committed and pushed.
2. Confirm GitHub Action run is green.
3. Check homepage and one inner page on production.
4. Check browser console for JavaScript errors.
5. Confirm version.txt matches the deployed commit.

## Troubleshooting

If workflow does not appear:
1. Make sure workflow file is committed to main.
2. Check repository Actions settings are enabled.
3. Check workflow is not disabled.

If SSH fails:
1. Verify DEPLOY_HOST, DEPLOY_PORT, DEPLOY_USER values.
2. Confirm DEPLOY_SSH_KEY contains private key content.
3. Confirm public key is authorized on hosting.

If files do not update:
1. Confirm DEPLOY_PATH points to active site theme directory.
2. Check rsync step output in workflow logs.
3. Confirm theme files changed under app/public/wp-content/themes/mandevco.
