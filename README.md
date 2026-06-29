# Mon CV 
"# MyCV" 

```
MyCV
├─ .editorconfig
├─ app
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ Api
│  │  │  │  ├─ EducationController.php
│  │  │  │  └─ ExperienceController.php
│  │  │  ├─ Auth
│  │  │  │  ├─ AuthenticatedSessionController.php
│  │  │  │  └─ RegisteredUserController.php
│  │  │  ├─ Controller.php
│  │  │  └─ ResumeController.php
│  │  ├─ Education
│  │  │  └─ StoreEducationRequest.php
│  │  ├─ Requests
│  │  │  ├─ Auth
│  │  │  │  ├─ LoginUserRequest.php
│  │  │  │  └─ RegisterUserRequest.php
│  │  │  ├─ Education
│  │  │  │  └─ UpdateEducationRequest.php
│  │  │  └─ Experience
│  │  │     ├─ StoreExperienceRequest.php
│  │  │     └─ UpdateExperienceRequest.php
│  │  └─ Resources
│  │     ├─ EducationResource.php
│  │     ├─ ExperienceResource.php
│  │     └─ UserResource.php
│  ├─ Models
│  │  ├─ Education.php
│  │  ├─ Experience.php
│  │  ├─ Resume.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_06_26_134847_create_personal_access_tokens_table.php
│  │  ├─ 2026_06_26_145110_create_resumes_table.php
│  │  ├─ 2026_06_29_105354_create_experiences_table.php
│  │  └─ 2026_06_29_120841_create_education_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     └─ 4a4decaf2fcdb74f4f5166a0f4ae27ce.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```
```
MyCV
├─ .editorconfig
├─ app
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ Api
│  │  │  │  ├─ EducationController.php
│  │  │  │  └─ ExperienceController.php
│  │  │  ├─ Auth
│  │  │  │  ├─ AuthenticatedSessionController.php
│  │  │  │  └─ RegisteredUserController.php
│  │  │  ├─ Controller.php
│  │  │  └─ ResumeController.php
│  │  ├─ Education
│  │  │  └─ StoreEducationRequest.php
│  │  ├─ Requests
│  │  │  ├─ Auth
│  │  │  │  ├─ LoginUserRequest.php
│  │  │  │  └─ RegisterUserRequest.php
│  │  │  ├─ Education
│  │  │  │  └─ UpdateEducationRequest.php
│  │  │  └─ Experience
│  │  │     ├─ StoreExperienceRequest.php
│  │  │     └─ UpdateExperienceRequest.php
│  │  └─ Resources
│  │     ├─ EducationResource.php
│  │     ├─ ExperienceResource.php
│  │     └─ UserResource.php
│  ├─ Models
│  │  ├─ Education.php
│  │  ├─ Experience.php
│  │  ├─ Resume.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_06_26_134847_create_personal_access_tokens_table.php
│  │  ├─ 2026_06_26_145110_create_resumes_table.php
│  │  ├─ 2026_06_29_105354_create_experiences_table.php
│  │  └─ 2026_06_29_120841_create_education_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     └─ 4a4decaf2fcdb74f4f5166a0f4ae27ce.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```
```
MyCV
├─ .editorconfig
├─ app
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ Api
│  │  │  │  ├─ EducationController.php
│  │  │  │  └─ ExperienceController.php
│  │  │  ├─ Auth
│  │  │  │  ├─ AuthenticatedSessionController.php
│  │  │  │  └─ RegisteredUserController.php
│  │  │  ├─ Controller.php
│  │  │  └─ ResumeController.php
│  │  ├─ Education
│  │  │  └─ StoreEducationRequest.php
│  │  ├─ Requests
│  │  │  ├─ Auth
│  │  │  │  ├─ LoginUserRequest.php
│  │  │  │  └─ RegisterUserRequest.php
│  │  │  ├─ Education
│  │  │  │  └─ UpdateEducationRequest.php
│  │  │  └─ Experience
│  │  │     ├─ StoreExperienceRequest.php
│  │  │     └─ UpdateExperienceRequest.php
│  │  └─ Resources
│  │     ├─ EducationResource.php
│  │     ├─ ExperienceResource.php
│  │     └─ UserResource.php
│  ├─ Models
│  │  ├─ Education.php
│  │  ├─ Experience.php
│  │  ├─ Resume.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_06_26_134847_create_personal_access_tokens_table.php
│  │  ├─ 2026_06_26_145110_create_resumes_table.php
│  │  ├─ 2026_06_29_105354_create_experiences_table.php
│  │  └─ 2026_06_29_120841_create_education_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     └─ 4a4decaf2fcdb74f4f5166a0f4ae27ce.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```
```
MyCV
├─ .editorconfig
├─ app
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ Api
│  │  │  │  ├─ EducationController.php
│  │  │  │  └─ ExperienceController.php
│  │  │  ├─ Auth
│  │  │  │  ├─ AuthenticatedSessionController.php
│  │  │  │  └─ RegisteredUserController.php
│  │  │  ├─ Controller.php
│  │  │  └─ ResumeController.php
│  │  ├─ Education
│  │  │  └─ StoreEducationRequest.php
│  │  ├─ Requests
│  │  │  ├─ Auth
│  │  │  │  ├─ LoginUserRequest.php
│  │  │  │  └─ RegisterUserRequest.php
│  │  │  ├─ Education
│  │  │  │  └─ UpdateEducationRequest.php
│  │  │  └─ Experience
│  │  │     ├─ StoreExperienceRequest.php
│  │  │     └─ UpdateExperienceRequest.php
│  │  └─ Resources
│  │     ├─ EducationResource.php
│  │     ├─ ExperienceResource.php
│  │     └─ UserResource.php
│  ├─ Models
│  │  ├─ Education.php
│  │  ├─ Experience.php
│  │  ├─ Resume.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_06_26_134847_create_personal_access_tokens_table.php
│  │  ├─ 2026_06_26_145110_create_resumes_table.php
│  │  ├─ 2026_06_29_105354_create_experiences_table.php
│  │  └─ 2026_06_29_120841_create_education_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     └─ 4a4decaf2fcdb74f4f5166a0f4ae27ce.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```