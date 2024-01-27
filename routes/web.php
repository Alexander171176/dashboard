<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('User/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Группа маршрутов для панели модератора
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/analytics', [App\Http\Controllers\User\Analytics\AnalyticsController::class, 'index'])->name('dashboard.analytics.index');// Маршрут для Analytics
    Route::get('/fintech', [App\Http\Controllers\User\Fintech\FintechController::class, 'index'])->name('dashboard.fintech.index');// Маршрут для Fintech
    Route::get('/calendar', [App\Http\Controllers\User\Calendar\CalendarController::class, 'index'])->name('dashboard.calendar.index');// Маршрут для Calendar
    Route::get('/campaigns', [App\Http\Controllers\User\Campaigns\CampaignsController::class, 'index'])->name('dashboard.campaigns.index');// Маршрут для Campaigns
    Route::get('/inbox', [App\Http\Controllers\User\Inbox\InboxController::class, 'index'])->name('dashboard.inbox.index');// Маршрут для Inbox
    Route::get('/messages', [App\Http\Controllers\User\Messages\MessagesController::class, 'index'])->name('dashboard.messages.index');// Маршрут для Messages
    Route::get('/signin', [App\Http\Controllers\User\Signin\SigninController::class, 'index'])->name('dashboard.signin.index');// Маршрут для Signin
    Route::get('/registration', [App\Http\Controllers\User\Signup\SignupController::class, 'index'])->name('dashboard.registration.index');// Маршрут для Signup
    Route::get('/password', [App\Http\Controllers\User\ResetPassword\ResetPasswordController::class, 'index'])->name('dashboard.password.index');// Маршрут для ResetPassword
    Route::get('/step-1', [App\Http\Controllers\User\Onboarding\OnboardingOneController::class, 'index'])->name('dashboard.step-one.index');// Маршрут для Onboarding01
    Route::get('/step-2', [App\Http\Controllers\User\Onboarding\OnboardingTwoController::class, 'index'])->name('dashboard.step-two.index');// Маршрут для Onboarding02
    Route::get('/step-3', [App\Http\Controllers\User\Onboarding\OnboardingThreeController::class, 'index'])->name('dashboard.step-three.index');// Маршрут для Onboarding03
    Route::get('/step-4', [App\Http\Controllers\User\Onboarding\OnboardingFourController::class, 'index'])->name('dashboard.step-four.index');// Маршрут для Onboarding04

    // Маршруты для группы 'ecommerce'
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('/customers', [App\Http\Controllers\User\Ecommerce\CustomersController::class, 'index'])->name('dashboard.customers.index');// Маршрут для Customers
        Route::get('/orders', [App\Http\Controllers\User\Ecommerce\OrdersController::class, 'index'])->name('dashboard.orders.index');// Маршрут для Orders
        Route::get('/invoices', [App\Http\Controllers\User\Ecommerce\InvoicesController::class, 'index'])->name('dashboard.invoices.index');// Маршрут для Invoices
        Route::get('/shop', [App\Http\Controllers\User\Ecommerce\ShopOneController::class, 'index'])->name('dashboard.shop.index');// Маршрут для Shop
        Route::get('/shop-2', [App\Http\Controllers\User\Ecommerce\ShopTwoController::class, 'index'])->name('dashboard.shop2.index');// Маршрут для Shop2
        Route::get('/product', [App\Http\Controllers\User\Ecommerce\ProductController::class, 'index'])->name('dashboard.product.index');// Маршрут для Product
        Route::get('/cart', [App\Http\Controllers\User\Ecommerce\CartOneController::class, 'index'])->name('dashboard.cart.index');// Маршрут для Cart
        Route::get('/cart-2', [App\Http\Controllers\User\Ecommerce\CartTwoController::class, 'index'])->name('dashboard.cart2.index');// Маршрут для Cart2
        Route::get('/cart-3', [App\Http\Controllers\User\Ecommerce\CartThreeController::class, 'index'])->name('dashboard.cart3.index');// Маршрут для Cart3
        Route::get('/pay', [App\Http\Controllers\User\Ecommerce\PayController::class, 'index'])->name('dashboard.pay.index');// Маршрут для Pay
        // Другие маршруты для 'ecommerce'...
    });

    // Маршруты для группы 'community'
    Route::group(['prefix' => 'community'], function () {
        Route::get('/users-1', [App\Http\Controllers\User\Community\UsersTabsController::class, 'index'])->name('dashboard.users1.index');// Маршрут для UsersTabs
        Route::get('/users-2', [App\Http\Controllers\User\Community\UsersTilesController::class, 'index'])->name('dashboard.users2.index');// Маршрут для UsersTiles
        Route::get('/profile', [App\Http\Controllers\User\Community\ProfileController::class, 'index'])->name('dashboard.profile.index');// Маршрут для Profile
        Route::get('/feed', [App\Http\Controllers\User\Community\FeedController::class, 'index'])->name('dashboard.feed.index');// Маршрут для Feed
        Route::get('/forum', [App\Http\Controllers\User\Community\ForumController::class, 'index'])->name('dashboard.forum.index');// Маршрут для Forum
        Route::get('/post', [App\Http\Controllers\User\Community\ForumPostController::class, 'index'])->name('dashboard.forum-post.index');// Маршрут для ForumPost
        Route::get('/meetups-1', [App\Http\Controllers\User\Community\MeetupsController::class, 'index'])->name('dashboard.meetups1.index');// Маршрут для Meetups
        Route::get('/meetups-2', [App\Http\Controllers\User\Community\MeetupsPostController::class, 'index'])->name('dashboard.meetups2.index');// Маршрут для MeetupsPost
        // Другие маршруты для 'community'...
    });

    // Маршруты для группы 'finance'
    Route::group(['prefix' => 'finance'], function () {
        Route::get('/cards', [App\Http\Controllers\User\Finance\CreditCardsController::class, 'index'])->name('dashboard.cards.index');// Маршрут для CreditCards
        Route::get('/transactions', [App\Http\Controllers\User\Finance\TransactionsController::class, 'index'])->name('dashboard.transactions.index');// Маршрут для Transactions
        Route::get('/transaction-2', [App\Http\Controllers\User\Finance\TransactionDetailsController::class, 'index'])->name('dashboard.transaction2.index');// Маршрут для TransactionDetails
        // Другие маршруты для 'finance'...
    });

    // Маршруты для группы 'job'
    Route::group(['prefix' => 'job'], function () {
        Route::get('/listing', [App\Http\Controllers\User\Job\JobListingController::class, 'index'])->name('dashboard.job-listing.index');// Маршрут для JobListing
        Route::get('/post', [App\Http\Controllers\User\Job\JobPostController::class, 'index'])->name('dashboard.job-post.index');// Маршрут для JobPost
        Route::get('/company', [App\Http\Controllers\User\Job\CompanyProfileController::class, 'index'])->name('dashboard.company.index');// Маршрут для CompanyProfile
        // Другие маршруты для 'job'...
    });

    // Маршруты для группы 'tasks'
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/kanban', [App\Http\Controllers\User\Tasks\TasksKanbanController::class, 'index'])->name('dashboard.tasks-kanban.index');// Маршрут для TasksKanban
        Route::get('/list', [App\Http\Controllers\User\Tasks\TasksListController::class, 'index'])->name('dashboard.tasks-list.index');// Маршрут для TasksList
        // Другие маршруты для 'tasks'...
    });

    // Маршруты для группы 'settings'
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/account', [App\Http\Controllers\User\Settings\AccountController::class, 'index'])->name('dashboard.account.index');// Маршрут для Account
        Route::get('/notifications', [App\Http\Controllers\User\Settings\NotificationsController::class, 'index'])->name('dashboard.notifications.index');// Маршрут для Notifications
        Route::get('/apps', [App\Http\Controllers\User\Settings\AppsController::class, 'index'])->name('dashboard.apps.index');// Маршрут для Apps
        Route::get('/plans', [App\Http\Controllers\User\Settings\PlansController::class, 'index'])->name('dashboard.plans.index');// Маршрут для Plans
        Route::get('/billing', [App\Http\Controllers\User\Settings\BillingController::class, 'index'])->name('dashboard.billing.index');// Маршрут для Billing
        Route::get('/feedback', [App\Http\Controllers\User\Settings\FeedbackController::class, 'index'])->name('dashboard.feedback.index');// Маршрут для Feedback
        // Другие маршруты для 'settings'...
    });

    // Маршруты для группы 'utility'
    Route::group(['prefix' => 'utility'], function () {
        Route::get('/changelog', [App\Http\Controllers\User\Utility\ChangelogController::class, 'index'])->name('dashboard.changelog.index');// Маршрут для Changelog
        Route::get('/roadmap', [App\Http\Controllers\User\Utility\RoadmapController::class, 'index'])->name('dashboard.roadmap.index');// Маршрут для Roadmap
        Route::get('/faqs', [App\Http\Controllers\User\Utility\FaqsController::class, 'index'])->name('dashboard.faqs.index');// Маршрут для Faqs
        Route::get('/empty', [App\Http\Controllers\User\Utility\EmptyStateController::class, 'index'])->name('dashboard.empty.index');// Маршрут для EmptyState
        Route::get('/404', [App\Http\Controllers\User\Utility\PageNotFoundController::class, 'index'])->name('dashboard.page-not-found.index');// Маршрут для PageNotFound
        Route::get('/knowledge', [App\Http\Controllers\User\Utility\KnowledgeBaseController::class, 'index'])->name('dashboard.knowledge.index');// Маршрут для KnowledgeBase
        // Другие маршруты для 'utility'...
    });

    // Маршруты для группы 'component'
    Route::group(['prefix' => 'component'], function () {
        Route::get('/button', [App\Http\Controllers\User\Component\ButtonPageController::class, 'index'])->name('dashboard.button.index');// Маршрут для ButtonPage
        Route::get('/form', [App\Http\Controllers\User\Component\FormPageController::class, 'index'])->name('dashboard.form.index');// Маршрут для FormPage
        Route::get('/dropdown', [App\Http\Controllers\User\Component\DropdownPageController::class, 'index'])->name('dashboard.dropdown.index');// Маршрут для DropdownPage
        Route::get('/alert', [App\Http\Controllers\User\Component\AlertPageController::class, 'index'])->name('dashboard.alert.index');// Маршрут для AlertPage
        Route::get('/modal', [App\Http\Controllers\User\Component\ModalPageController::class, 'index'])->name('dashboard.modal.index');// Маршрут для ModalPage
        Route::get('/pagination', [App\Http\Controllers\User\Component\PaginationPageController::class, 'index'])->name('dashboard.pagination.index');// Маршрут для PaginationPage
        Route::get('/tabs', [App\Http\Controllers\User\Component\TabsPageController::class, 'index'])->name('dashboard.tabs.index');// Маршрут для TabsPage
        Route::get('/breadcrumb', [App\Http\Controllers\User\Component\BreadcrumbPageController::class, 'index'])->name('dashboard.breadcrumb.index');// Маршрут для BreadcrumbPage
        Route::get('/badge', [App\Http\Controllers\User\Component\BadgePageController::class, 'index'])->name('dashboard.badge.index');// Маршрут для BadgePage
        Route::get('/avatar', [App\Http\Controllers\User\Component\AvatarPageController::class, 'index'])->name('dashboard.avatar.index');// Маршрут для AvatarPage
        Route::get('/tooltip', [App\Http\Controllers\User\Component\TooltipPageController::class, 'index'])->name('dashboard.tooltip.index');// Маршрут для TooltipPage
        Route::get('/accordion', [App\Http\Controllers\User\Component\AccordionPageController::class, 'index'])->name('dashboard.accordion.index');// Маршрут для AccordionPage
        Route::get('/icons', [App\Http\Controllers\User\Component\IconsPageController::class, 'index'])->name('dashboard.icons.index');// Маршрут для IconsPage
        // Другие маршруты для 'component'...
    });

    // Другие маршруты...
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
});

// Группа маршрутов для панели администратора
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    // Группа маршрутов CRUD
    Route::resource('/users', \App\Http\Controllers\CRUD\UserController::class);
    Route::resource('/roles', \App\Http\Controllers\CRUD\RoleController::class);
    Route::resource('/permissions', \App\Http\Controllers\CRUD\PermissionController::class);

    Route::get('/analytics', [App\Http\Controllers\Admin\Analytics\AnalyticsController::class, 'index'])->name('admin.analytics.index');// Маршрут для Analytics
    Route::get('/fintech', [App\Http\Controllers\Admin\Fintech\FintechController::class, 'index'])->name('admin.fintech.index');// Маршрут для Fintech
    Route::get('/calendar', [App\Http\Controllers\Admin\Calendar\CalendarController::class, 'index'])->name('admin.calendar.index');// Маршрут для Calendar
    Route::get('/campaigns', [App\Http\Controllers\Admin\Campaigns\CampaignsController::class, 'index'])->name('admin.campaigns.index');// Маршрут для Campaigns
    Route::get('/inbox', [App\Http\Controllers\Admin\Inbox\InboxController::class, 'index'])->name('admin.inbox.index');// Маршрут для Inbox
    Route::get('/messages', [App\Http\Controllers\Admin\Messages\MessagesController::class, 'index'])->name('admin.messages.index');// Маршрут для Messages
    Route::get('/signin', [App\Http\Controllers\Admin\Signin\SigninController::class, 'index'])->name('admin.signin.index');// Маршрут для Signin
    Route::get('/registration', [App\Http\Controllers\Admin\Signup\SignupController::class, 'index'])->name('admin.registration.index');// Маршрут для Signup
    Route::get('/password', [App\Http\Controllers\Admin\ResetPassword\ResetPasswordController::class, 'index'])->name('admin.password.index');// Маршрут для ResetPassword
    Route::get('/step-1', [App\Http\Controllers\Admin\Onboarding\OnboardingOneController::class, 'index'])->name('admin.step-one.index');// Маршрут для Onboarding01
    Route::get('/step-2', [App\Http\Controllers\Admin\Onboarding\OnboardingTwoController::class, 'index'])->name('admin.step-two.index');// Маршрут для Onboarding02
    Route::get('/step-3', [App\Http\Controllers\Admin\Onboarding\OnboardingThreeController::class, 'index'])->name('admin.step-three.index');// Маршрут для Onboarding03
    Route::get('/step-4', [App\Http\Controllers\Admin\Onboarding\OnboardingFourController::class, 'index'])->name('admin.step-four.index');// Маршрут для Onboarding04

    // Маршруты для группы 'ecommerce'
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('/customers', [App\Http\Controllers\Admin\Ecommerce\CustomersController::class, 'index'])->name('admin.customers.index');// Маршрут для Customers
        Route::get('/orders', [App\Http\Controllers\Admin\Ecommerce\OrdersController::class, 'index'])->name('admin.orders.index');// Маршрут для Orders
        Route::get('/invoices', [App\Http\Controllers\Admin\Ecommerce\InvoicesController::class, 'index'])->name('admin.invoices.index');// Маршрут для Invoices
        Route::get('/shop', [App\Http\Controllers\Admin\Ecommerce\ShopOneController::class, 'index'])->name('admin.shop.index');// Маршрут для Shop
        Route::get('/shop-2', [App\Http\Controllers\Admin\Ecommerce\ShopTwoController::class, 'index'])->name('admin.shop2.index');// Маршрут для Shop2
        Route::get('/product', [App\Http\Controllers\Admin\Ecommerce\ProductController::class, 'index'])->name('admin.product.index');// Маршрут для Product
        Route::get('/cart', [App\Http\Controllers\Admin\Ecommerce\CartOneController::class, 'index'])->name('admin.cart.index');// Маршрут для Cart
        Route::get('/cart-2', [App\Http\Controllers\Admin\Ecommerce\CartTwoController::class, 'index'])->name('admin.cart2.index');// Маршрут для Cart2
        Route::get('/cart-3', [App\Http\Controllers\Admin\Ecommerce\CartThreeController::class, 'index'])->name('admin.cart3.index');// Маршрут для Cart3
        Route::get('/pay', [App\Http\Controllers\Admin\Ecommerce\PayController::class, 'index'])->name('admin.pay.index');// Маршрут для Pay
        // Другие маршруты для 'ecommerce'...
    });

    // Маршруты для группы 'community'
    Route::group(['prefix' => 'community'], function () {
        Route::get('/users-1', [App\Http\Controllers\Admin\Community\UsersTabsController::class, 'index'])->name('admin.users1.index');// Маршрут для UsersTabs
        Route::get('/users-2', [App\Http\Controllers\Admin\Community\UsersTilesController::class, 'index'])->name('admin.users2.index');// Маршрут для UsersTiles
        Route::get('/profile', [App\Http\Controllers\Admin\Community\ProfileController::class, 'index'])->name('admin.profile.index');// Маршрут для Profile
        Route::get('/feed', [App\Http\Controllers\Admin\Community\FeedController::class, 'index'])->name('admin.feed.index');// Маршрут для Feed
        Route::get('/forum', [App\Http\Controllers\Admin\Community\ForumController::class, 'index'])->name('admin.forum.index');// Маршрут для Forum
        Route::get('/post', [App\Http\Controllers\Admin\Community\ForumPostController::class, 'index'])->name('admin.forum-post.index');// Маршрут для ForumPost
        Route::get('/meetups-1', [App\Http\Controllers\Admin\Community\MeetupsController::class, 'index'])->name('admin.meetups1.index');// Маршрут для Meetups
        Route::get('/meetups-2', [App\Http\Controllers\Admin\Community\MeetupsPostController::class, 'index'])->name('admin.meetups2.index');// Маршрут для MeetupsPost
        // Другие маршруты для 'community'...
    });

    // Маршруты для группы 'finance'
    Route::group(['prefix' => 'finance'], function () {
        Route::get('/cards', [App\Http\Controllers\Admin\Finance\CreditCardsController::class, 'index'])->name('admin.cards.index');// Маршрут для CreditCards
        Route::get('/transactions', [App\Http\Controllers\Admin\Finance\TransactionsController::class, 'index'])->name('admin.transactions.index');// Маршрут для Transactions
        Route::get('/transaction-2', [App\Http\Controllers\Admin\Finance\TransactionDetailsController::class, 'index'])->name('admin.transaction2.index');// Маршрут для TransactionDetails
        // Другие маршруты для 'finance'...
    });

    // Маршруты для группы 'job'
    Route::group(['prefix' => 'job'], function () {
        Route::get('/listing', [App\Http\Controllers\Admin\Job\JobListingController::class, 'index'])->name('admin.job-listing.index');// Маршрут для JobListing
        Route::get('/post', [App\Http\Controllers\Admin\Job\JobPostController::class, 'index'])->name('admin.job-post.index');// Маршрут для JobPost
        Route::get('/company', [App\Http\Controllers\Admin\Job\CompanyProfileController::class, 'index'])->name('admin.company.index');// Маршрут для CompanyProfile
        // Другие маршруты для 'job'...
    });

    // Маршруты для группы 'tasks'
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/kanban', [App\Http\Controllers\Admin\Tasks\TasksKanbanController::class, 'index'])->name('admin.tasks-kanban.index');// Маршрут для TasksKanban
        Route::get('/list', [App\Http\Controllers\Admin\Tasks\TasksListController::class, 'index'])->name('admin.tasks-list.index');// Маршрут для TasksList
        // Другие маршруты для 'tasks'...
    });

    // Маршруты для группы 'settings'
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/account', [App\Http\Controllers\Admin\Settings\AccountController::class, 'index'])->name('admin.account.index');// Маршрут для Account
        Route::get('/notifications', [App\Http\Controllers\Admin\Settings\NotificationsController::class, 'index'])->name('admin.notifications.index');// Маршрут для Notifications
        Route::get('/apps', [App\Http\Controllers\Admin\Settings\AppsController::class, 'index'])->name('admin.apps.index');// Маршрут для Apps
        Route::get('/plans', [App\Http\Controllers\Admin\Settings\PlansController::class, 'index'])->name('admin.plans.index');// Маршрут для Plans
        Route::get('/billing', [App\Http\Controllers\Admin\Settings\BillingController::class, 'index'])->name('admin.billing.index');// Маршрут для Billing
        Route::get('/feedback', [App\Http\Controllers\Admin\Settings\FeedbackController::class, 'index'])->name('admin.feedback.index');// Маршрут для Feedback
        // Другие маршруты для 'settings'...
    });

    // Маршруты для группы 'utility'
    Route::group(['prefix' => 'utility'], function () {
        Route::get('/changelog', [App\Http\Controllers\Admin\Utility\ChangelogController::class, 'index'])->name('admin.changelog.index');// Маршрут для Changelog
        Route::get('/roadmap', [App\Http\Controllers\Admin\Utility\RoadmapController::class, 'index'])->name('admin.roadmap.index');// Маршрут для Roadmap
        Route::get('/faqs', [App\Http\Controllers\Admin\Utility\FaqsController::class, 'index'])->name('admin.faqs.index');// Маршрут для Faqs
        Route::get('/empty', [App\Http\Controllers\Admin\Utility\EmptyStateController::class, 'index'])->name('admin.empty.index');// Маршрут для EmptyState
        Route::get('/404', [App\Http\Controllers\Admin\Utility\PageNotFoundController::class, 'index'])->name('admin.page-not-found.index');// Маршрут для PageNotFound
        Route::get('/knowledge', [App\Http\Controllers\Admin\Utility\KnowledgeBaseController::class, 'index'])->name('admin.knowledge.index');// Маршрут для KnowledgeBase
        // Другие маршруты для 'utility'...
    });

    // Маршруты для группы 'component'
    Route::group(['prefix' => 'component'], function () {
        Route::get('/button', [App\Http\Controllers\Admin\Component\ButtonPageController::class, 'index'])->name('admin.button.index');// Маршрут для ButtonPage
        Route::get('/form', [App\Http\Controllers\Admin\Component\FormPageController::class, 'index'])->name('admin.form.index');// Маршрут для FormPage
        Route::get('/dropdown', [App\Http\Controllers\Admin\Component\DropdownPageController::class, 'index'])->name('admin.dropdown.index');// Маршрут для DropdownPage
        Route::get('/alert', [App\Http\Controllers\Admin\Component\AlertPageController::class, 'index'])->name('admin.alert.index');// Маршрут для AlertPage
        Route::get('/modal', [App\Http\Controllers\Admin\Component\ModalPageController::class, 'index'])->name('admin.modal.index');// Маршрут для ModalPage
        Route::get('/pagination', [App\Http\Controllers\Admin\Component\PaginationPageController::class, 'index'])->name('admin.pagination.index');// Маршрут для PaginationPage
        Route::get('/tabs', [App\Http\Controllers\Admin\Component\TabsPageController::class, 'index'])->name('admin.tabs.index');// Маршрут для TabsPage
        Route::get('/breadcrumb', [App\Http\Controllers\Admin\Component\BreadcrumbPageController::class, 'index'])->name('admin.breadcrumb.index');// Маршрут для BreadcrumbPage
        Route::get('/badge', [App\Http\Controllers\Admin\Component\BadgePageController::class, 'index'])->name('admin.badge.index');// Маршрут для BadgePage
        Route::get('/avatar', [App\Http\Controllers\Admin\Component\AvatarPageController::class, 'index'])->name('admin.avatar.index');// Маршрут для AvatarPage
        Route::get('/tooltip', [App\Http\Controllers\Admin\Component\TooltipPageController::class, 'index'])->name('admin.tooltip.index');// Маршрут для TooltipPage
        Route::get('/accordion', [App\Http\Controllers\Admin\Component\AccordionPageController::class, 'index'])->name('admin.accordion.index');// Маршрут для AccordionPage
        Route::get('/icons', [App\Http\Controllers\Admin\Component\IconsPageController::class, 'index'])->name('admin.icons.index');// Маршрут для IconsPage
        // Другие маршруты для 'component'...
    });

    // Другие маршруты...
});

require __DIR__.'/auth.php';
