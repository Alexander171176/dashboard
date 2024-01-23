<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Analytics\AnalyticsController;
use App\Http\Controllers\Admin\Calendar\CalendarController;
use App\Http\Controllers\Admin\Campaigns\CampaignsController;
use App\Http\Controllers\Admin\Community\FeedController;
use App\Http\Controllers\Admin\Community\ForumController;
use App\Http\Controllers\Admin\Community\ForumPostController;
use App\Http\Controllers\Admin\Community\MeetupsController;
use App\Http\Controllers\Admin\Community\MeetupsPostController;
use App\Http\Controllers\Admin\Community\UsersTabsController;
use App\Http\Controllers\Admin\Community\UsersTilesController;
use App\Http\Controllers\Admin\Component\AccordionPageController;
use App\Http\Controllers\Admin\Component\AlertPageController;
use App\Http\Controllers\Admin\Component\AvatarPageController;
use App\Http\Controllers\Admin\Component\BadgePageController;
use App\Http\Controllers\Admin\Component\BreadcrumbPageController;
use App\Http\Controllers\Admin\Component\ButtonPageController;
use App\Http\Controllers\Admin\Component\DropdownPageController;
use App\Http\Controllers\Admin\Component\FormPageController;
use App\Http\Controllers\Admin\Component\IconsPageController;
use App\Http\Controllers\Admin\Component\ModalPageController;
use App\Http\Controllers\Admin\Component\PaginationPageController;
use App\Http\Controllers\Admin\Component\TabsPageController;
use App\Http\Controllers\Admin\Component\TooltipPageController;
use App\Http\Controllers\Admin\Ecommerce\CartOneController;
use App\Http\Controllers\Admin\Ecommerce\CartThreeController;
use App\Http\Controllers\Admin\Ecommerce\CartTwoController;
use App\Http\Controllers\Admin\Ecommerce\CustomersController;
use App\Http\Controllers\Admin\Ecommerce\InvoicesController;
use App\Http\Controllers\Admin\Ecommerce\OrdersController;
use App\Http\Controllers\Admin\Ecommerce\PayController;
use App\Http\Controllers\Admin\Ecommerce\ProductController;
use App\Http\Controllers\Admin\Ecommerce\ShopOneController;
use App\Http\Controllers\Admin\Ecommerce\ShopTwoController;
use App\Http\Controllers\Admin\Finance\CreditCardsController;
use App\Http\Controllers\Admin\Finance\TransactionDetailsController;
use App\Http\Controllers\Admin\Finance\TransactionsController;
use App\Http\Controllers\Admin\Fintech\FintechController;
use App\Http\Controllers\Admin\Inbox\InboxController;
use App\Http\Controllers\Admin\Job\CompanyProfileController;
use App\Http\Controllers\Admin\Job\JobListingController;
use App\Http\Controllers\Admin\Job\JobPostController;
use App\Http\Controllers\Admin\Messages\MessagesController;
use App\Http\Controllers\Admin\Onboarding\OnboardingFourController;
use App\Http\Controllers\Admin\Onboarding\OnboardingOneController;
use App\Http\Controllers\Admin\Onboarding\OnboardingThreeController;
use App\Http\Controllers\Admin\Onboarding\OnboardingTwoController;
use App\Http\Controllers\Admin\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Admin\Settings\AccountController;
use App\Http\Controllers\Admin\Settings\AppsController;
use App\Http\Controllers\Admin\Settings\BillingController;
use App\Http\Controllers\Admin\Settings\FeedbackController;
use App\Http\Controllers\Admin\Settings\NotificationsController;
use App\Http\Controllers\Admin\Settings\PlansController;
use App\Http\Controllers\Admin\Signin\SigninController;
use App\Http\Controllers\Admin\Signup\SignupController;
use App\Http\Controllers\Admin\Tasks\TasksKanbanController;
use App\Http\Controllers\Admin\Tasks\TasksListController;
use App\Http\Controllers\Admin\Utility\ChangelogController;
use App\Http\Controllers\Admin\Utility\EmptyStateController;
use App\Http\Controllers\Admin\Utility\FaqsController;
use App\Http\Controllers\Admin\Utility\KnowledgeBaseController;
use App\Http\Controllers\Admin\Utility\PageNotFoundController;
use App\Http\Controllers\Admin\Utility\RoadmapController;
use App\Http\Controllers\ProfileController;
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
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Группа маршрутов для панели администратора
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');// Маршрут для Analytics
    Route::get('/fintech', [FintechController::class, 'index'])->name('fintech');// Маршрут для Fintech
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');// Маршрут для Calendar
    Route::get('/campaigns', [CampaignsController::class, 'index'])->name('campaigns.index');// Маршрут для Campaigns
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');// Маршрут для Inbox
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');// Маршрут для Messages
    Route::get('/signin', [SigninController::class, 'index'])->name('signin');// Маршрут для Signin
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');// Маршрут для Signup
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password');// Маршрут для ResetPassword
    Route::get('/onboarding-01', [OnboardingOneController::class, 'index'])->name('onboarding-01');// Маршрут для Onboarding01
    Route::get('/onboarding-02', [OnboardingTwoController::class, 'index'])->name('onboarding-02');// Маршрут для Onboarding02
    Route::get('/onboarding-03', [OnboardingThreeController::class, 'index'])->name('onboarding-03');// Маршрут для Onboarding03
    Route::get('/onboarding-04', [OnboardingFourController::class, 'index'])->name('onboarding-04');// Маршрут для Onboarding04

    // Маршруты для группы 'ecommerce'
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('/customers', [CustomersController::class, 'index'])->name('customers');// Маршрут для Customers
        Route::get('/orders', [OrdersController::class, 'index'])->name('orders');// Маршрут для Orders
        Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices');// Маршрут для Invoices
        Route::get('/shop', [ShopOneController::class, 'index'])->name('shop');// Маршрут для Shop
        Route::get('/shop2', [ShopTwoController::class, 'index'])->name('shop2');// Маршрут для Shop2
        Route::get('/product', [ProductController::class, 'index'])->name('product');// Маршрут для Product
        Route::get('/cart', [CartOneController::class, 'index'])->name('cart');// Маршрут для Cart
        Route::get('/cart-2', [CartTwoController::class, 'index'])->name('cart2');// Маршрут для Cart2
        Route::get('/cart-3', [CartThreeController::class, 'index'])->name('cart3');// Маршрут для Cart3
        Route::get('/pay', [PayController::class, 'index'])->name('pay');// Маршрут для Pay
        // Другие маршруты для 'ecommerce'...
    });

    // Маршруты для группы 'community'
    Route::group(['prefix' => 'community'], function () {
        Route::get('/users-tabs', [UsersTabsController::class, 'index'])->name('users-tabs');// Маршрут для UsersTabs
        Route::get('/users-tiles', [UsersTilesController::class, 'index'])->name('users-tiles');// Маршрут для UsersTiles
        Route::get('/profile', [App\Http\Controllers\Admin\Community\ProfileController::class, 'index'])->name('profile');// Маршрут для Profile
        Route::get('/feed', [FeedController::class, 'index'])->name('feed');// Маршрут для Feed
        Route::get('/forum', [ForumController::class, 'index'])->name('forum');// Маршрут для Forum
        Route::get('/forum-post', [ForumPostController::class, 'index'])->name('forum-post');// Маршрут для ForumPost
        Route::get('/meetups', [MeetupsController::class, 'index'])->name('meetups');// Маршрут для Meetups
        Route::get('/meetups-post', [MeetupsPostController::class, 'index'])->name('meetups-post');// Маршрут для MeetupsPost
        // Другие маршруты для 'community'...
    });

    // Маршруты для группы 'finance'
    Route::group(['prefix' => 'finance'], function () {
        Route::get('/cards', [CreditCardsController::class, 'index'])->name('cards');// Маршрут для CreditCards
        Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');// Маршрут для Transactions
        Route::get('/transaction-details', [TransactionDetailsController::class, 'index'])->name('transaction-details');// Маршрут для TransactionDetails
        // Другие маршруты для 'finance'...
    });

    // Маршруты для группы 'finance'
    Route::group(['prefix' => 'job'], function () {
        Route::get('/job-listing', [JobListingController::class, 'index'])->name('job-listing');// Маршрут для JobListing
        Route::get('/job-post', [JobPostController::class, 'index'])->name('job-post');// Маршрут для JobPost
        Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('company-profile');// Маршрут для CompanyProfile
        // Другие маршруты для 'finance'...
    });

    // Маршруты для группы 'tasks'
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/kanban', [TasksKanbanController::class, 'index'])->name('tasks-kanban');// Маршрут для TasksKanban
        Route::get('/list', [TasksListController::class, 'index'])->name('tasks-list');// Маршрут для TasksList
        // Другие маршруты для 'tasks'...
    });

    // Маршруты для группы 'settings'
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/account', [AccountController::class, 'index'])->name('account');// Маршрут для Account
        Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');// Маршрут для Notifications
        Route::get('/apps', [AppsController::class, 'index'])->name('apps');// Маршрут для Apps
        Route::get('/plans', [PlansController::class, 'index'])->name('plans');// Маршрут для Plans
        Route::get('/billing', [BillingController::class, 'index'])->name('billing');// Маршрут для Billing
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');// Маршрут для Feedback
        // Другие маршруты для 'settings'...
    });

    // Маршруты для группы 'utility'
    Route::group(['prefix' => 'utility'], function () {
        Route::get('/changelog', [ChangelogController::class, 'index'])->name('changelog');// Маршрут для Changelog
        Route::get('/roadmap', [RoadmapController::class, 'index'])->name('roadmap');// Маршрут для Roadmap
        Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');// Маршрут для Faqs
        Route::get('/empty-state', [EmptyStateController::class, 'index'])->name('empty-state');// Маршрут для EmptyState
        Route::get('/404', [PageNotFoundController::class, 'index'])->name('page-not-found');// Маршрут для PageNotFound
        Route::get('/knowledge-base', [KnowledgeBaseController::class, 'index'])->name('knowledge-base');// Маршрут для KnowledgeBase
        // Другие маршруты для 'utility'...
    });

    // Маршруты для группы 'component'
    Route::group(['prefix' => 'component'], function () {
        Route::get('/button', [ButtonPageController::class, 'index'])->name('button-page');// Маршрут для ButtonPage
        Route::get('/form', [FormPageController::class, 'index'])->name('form-page');// Маршрут для FormPage
        Route::get('/dropdown', [DropdownPageController::class, 'index'])->name('dropdown-page');// Маршрут для DropdownPage
        Route::get('/alert', [AlertPageController::class, 'index'])->name('alert-page');// Маршрут для AlertPage
        Route::get('/modal', [ModalPageController::class, 'index'])->name('modal-page');// Маршрут для ModalPage
        Route::get('/pagination', [PaginationPageController::class, 'index'])->name('pagination-page');// Маршрут для PaginationPage
        Route::get('/tabs', [TabsPageController::class, 'index'])->name('tabs-page');// Маршрут для TabsPage
        Route::get('/breadcrumb', [BreadcrumbPageController::class, 'index'])->name('breadcrumb-page');// Маршрут для BreadcrumbPage
        Route::get('/badge', [BadgePageController::class, 'index'])->name('badge-page');// Маршрут для BadgePage
        Route::get('/avatar', [AvatarPageController::class, 'index'])->name('avatar-page');// Маршрут для AvatarPage
        Route::get('/tooltip', [TooltipPageController::class, 'index'])->name('tooltip-page');// Маршрут для TooltipPage
        Route::get('/accordion', [AccordionPageController::class, 'index'])->name('accordion-page');// Маршрут для AccordionPage
        Route::get('/icons', [IconsPageController::class, 'index'])->name('icons-page');// Маршрут для IconsPage
        // Другие маршруты для 'component'...
    });

    // Другие маршруты...
});

require __DIR__.'/auth.php';
