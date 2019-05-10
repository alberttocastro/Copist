<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'copist');

// Project repository
set('repository', 'git@github.com:alberttocastro/Copist.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('coins.alberttocastro.life')
    ->user('coins')
    ->set('http_user','coins')
    ->set('deploy_path', '/home2/coins/public_html/{{application}}')
    ->port(2222)
    ->identityFile('~/.ssh/id_rsa')
    ->forwardAgent(true);    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

