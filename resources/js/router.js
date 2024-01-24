// router.js

import { createWebHistory, createRouter } from 'vue-router';

const routes = [
    // route user
    {
        path: '/dashboard',
        component: () => import('./Pages/User/Dashboard.vue'),
        name: 'dashboard',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/analytics',
        component: () => import('./Pages/User/Analytics.vue'),
        name: 'dashboard-analytics',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/fintech',
        component: () => import('./Pages/User/Fintech.vue'),
        name: 'dashboard-fintech',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/calendar',
        component: () => import('./Pages/User/Calendar.vue'),
        name: 'dashboard-calendar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/campaigns',
        component: () => import('./Pages/User/Campaigns.vue'),
        name: 'dashboard-campaigns',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/inbox',
        component: () => import('./Pages/User/Inbox.vue'),
        name: 'dashboard-inbox',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/messages',
        component: () => import('./Pages/User/Messages.vue'),
        name: 'dashboard-messages',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/signin',
        component: () => import('./Pages/User/Signin.vue'),
        name: 'dashboard-signin',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/registration',
        component: () => import('./Pages/User/Signup.vue'),
        name: 'dashboard-registration',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/password',
        component: () => import('./Pages/User/ResetPassword.vue'),
        name: 'dashboard-password',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/step-1',
        component: () => import('./Pages/User/Onboarding01.vue'),
        name: 'dashboard-step-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/step-2',
        component: () => import('./Pages/User/Onboarding02.vue'),
        name: 'dashboard-step-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/step-3',
        component: () => import('./Pages/User/Onboarding03.vue'),
        name: 'dashboard-step-3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/step-4',
        component: () => import('./Pages/User/Onboarding04.vue'),
        name: 'dashboard-step-4',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/customers',
        component: () => import('./Pages/User/ecommerce/Customers.vue'),
        name: 'dashboard-ecommerce-customers',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/orders',
        component: () => import('./Pages/User/ecommerce/Orders.vue'),
        name: 'dashboard-ecommerce-orders',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/invoices',
        component: () => import('./Pages/User/ecommerce/Invoices.vue'),
        name: 'dashboard-ecommerce-invoices',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/shop',
        component: () => import('./Pages/User/ecommerce/Shop.vue'),
        name: 'dashboard-ecommerce-shop',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/shop-2',
        component: () => import('./Pages/User/ecommerce/Shop2.vue'),
        name: 'dashboard-ecommerce-shop-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/product',
        component: () => import('./Pages/User/ecommerce/Product.vue'),
        name: 'dashboard-ecommerce-product',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/cart',
        component: () => import('./Pages/User/ecommerce/Cart.vue'),
        name: 'dashboard-ecommerce-cart',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/cart-2',
        component: () => import('./Pages/User/ecommerce/Cart2.vue'),
        name: 'dashboard-ecommerce-cart-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/cart-3',
        component: () => import('./Pages/User/ecommerce/Cart3.vue'),
        name: 'dashboard-ecommerce-cart-3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/ecommerce/pay',
        component: () => import('./Pages/User/ecommerce/Pay.vue'),
        name: 'dashboard-ecommerce-pay',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/users-1',
        component: () => import('./Pages/User/community/UsersTabs.vue'),
        name: 'dashboard-community-users-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/users-2',
        component: () => import('./Pages/User/community/UsersTiles.vue'),
        name: 'dashboard-community-users-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/profile',
        component: () => import('./Pages/User/community/Profile.vue'),
        name: 'dashboard-community-profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/feed',
        component: () => import('./Pages/User/community/Feed.vue'),
        name: 'dashboard-community-feed',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/forum',
        component: () => import('./Pages/User/community/Forum.vue'),
        name: 'dashboard-community-forum',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/post',
        component: () => import('./Pages/User/community/ForumPost.vue'),
        name: 'dashboard-community-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/meetups-1',
        component: () => import('./Pages/User/community/Meetups.vue'),
        name: 'dashboard-community-meetups-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/community/meetups-2',
        component: () => import('./Pages/User/community/MeetupsPost.vue'),
        name: 'dashboard-community-meetups-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/finance/cards',
        component: () => import('./Pages/User/finance/CreditCards.vue'),
        name: 'dashboard-finance-cards',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/finance/transactions',
        component: () => import('./Pages/User/finance/Transactions.vue'),
        name: 'dashboard-finance-transactions',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/finance/transaction-2',
        component: () => import('./Pages/User/finance/TransactionDetails.vue'),
        name: 'dashboard-finance-transaction-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/job/listing',
        component: () => import('./Pages/User/job/JobListing.vue'),
        name: 'dashboard-job-listing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/job/post',
        component: () => import('./Pages/User/job/JobPost.vue'),
        name: 'dashboard-job-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/job/company',
        component: () => import('./Pages/User/job/CompanyProfile.vue'),
        name: 'dashboard-job-company',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/tasks/kanban',
        component: () => import('./Pages/User/tasks/TasksKanban.vue'),
        name: 'dashboard-tasks-kanban',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/tasks/list',
        component: () => import('./Pages/User/tasks/TasksList.vue'),
        name: 'dashboard-tasks-list',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/account',
        component: () => import('./Pages/User/settings/Account.vue'),
        name: 'dashboard-settings-account',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/notifications',
        component: () => import('./Pages/User/settings/Notifications.vue'),
        name: 'dashboard-settings-notifications',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/apps',
        component: () => import('./Pages/User/settings/Apps.vue'),
        name: 'dashboard-settings-apps',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/plans',
        component: () => import('./Pages/User/settings/Plans.vue'),
        name: 'dashboard-settings-plans',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/billing',
        component: () => import('./Pages/User/settings/Billing.vue'),
        name: 'dashboard-settings-billing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/settings/feedback',
        component: () => import('./Pages/User/settings/Feedback.vue'),
        name: 'dashboard-settings-feedback',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/changelog',
        component: () => import('./Pages/User/utility/Changelog.vue'),
        name: 'dashboard-utility-changelog',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/roadmap',
        component: () => import('./Pages/User/utility/Roadmap.vue'),
        name: 'dashboard-utility-roadmap',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/faqs',
        component: () => import('./Pages/User/utility/Faqs.vue'),
        name: 'dashboard-utility-faqs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/empty',
        component: () => import('./Pages/User/utility/EmptyState.vue'),
        name: 'dashboard-utility-empty',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/404',
        component: () => import('./Pages/User/utility/PageNotFound.vue'),
        name: 'dashboard-utility-404',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/utility/knowledge',
        component: () => import('./Pages/User/utility/KnowledgeBase.vue'),
        name: 'dashboard-utility-knowledge',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/button',
        component: () => import('./Pages/User/component/ButtonPage.vue'),
        name: 'dashboard-component-button',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/form',
        component: () => import('./Pages/User/component/FormPage.vue'),
        name: 'dashboard-component-form',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/dropdown',
        component: () => import('./Pages/User/component/DropdownPage.vue'),
        name: 'dashboard-component-dropdown',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/alert',
        component: () => import('./Pages/User/component/AlertPage.vue'),
        name: 'dashboard-component-alert',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/modal',
        component: () => import('./Pages/User/component/ModalPage.vue'),
        name: 'dashboard-component-modal',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/pagination',
        component: () => import('./Pages/User/component/PaginationPage.vue'),
        name: 'dashboard-component-pagination',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/tabs',
        component: () => import('./Pages/User/component/TabsPage.vue'),
        name: 'dashboard-component-tabs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/breadcrumb',
        component: () => import('./Pages/User/component/BreadcrumbPage.vue'),
        name: 'dashboard-component-breadcrumb',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/badge',
        component: () => import('./Pages/User/component/BadgePage.vue'),
        name: 'dashboard-component-badge',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/avatar',
        component: () => import('./Pages/User/component/AvatarPage.vue'),
        name: 'dashboard-component-avatar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/tooltip',
        component: () => import('./Pages/User/component/TooltipPage.vue'),
        name: 'dashboard-component-tooltip',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/accordion',
        component: () => import('./Pages/User/component/AccordionPage.vue'),
        name: 'dashboard-component-accordion',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/component/icons',
        component: () => import('./Pages/User/component/IconsPage.vue'),
        name: 'dashboard-component-icons',
        meta: { middleware: ['auth', 'verified'] },
    },
    // route admin
    {
        path: '/admin',
        component: () => import('./Pages/Admin/Admin.vue'),
        name: 'admin',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/analytics',
        component: () => import('./Pages/Admin/Analytics.vue'),
        name: 'admin-analytics',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/fintech',
        component: () => import('./Pages/Admin/Fintech.vue'),
        name: 'admin-fintech',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/calendar',
        component: () => import('./Pages/Admin/Calendar.vue'),
        name: 'admin-calendar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/campaigns',
        component: () => import('./Pages/Admin/Campaigns.vue'),
        name: 'admin-campaigns',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/inbox',
        component: () => import('./Pages/Admin/Inbox.vue'),
        name: 'admin-inbox',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/messages',
        component: () => import('./Pages/Admin/Messages.vue'),
        name: 'admin-messages',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/signin',
        component: () => import('./Pages/Admin/Signin.vue'),
        name: 'admin-signin',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/registration',
        component: () => import('./Pages/Admin/Signup.vue'),
        name: 'admin-registration',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/password',
        component: () => import('./Pages/Admin/ResetPassword.vue'),
        name: 'admin-password',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/step-1',
        component: () => import('./Pages/Admin/Onboarding01.vue'),
        name: 'admin-step-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/step-2',
        component: () => import('./Pages/Admin/Onboarding02.vue'),
        name: 'admin-step-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/step-3',
        component: () => import('./Pages/Admin/Onboarding03.vue'),
        name: 'admin-step-3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/step-4',
        component: () => import('./Pages/Admin/Onboarding04.vue'),
        name: 'admin-step-4',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/customers',
        component: () => import('./Pages/Admin/ecommerce/Customers.vue'),
        name: 'admin-ecommerce-customers',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/orders',
        component: () => import('./Pages/Admin/ecommerce/Orders.vue'),
        name: 'admin-ecommerce-orders',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/invoices',
        component: () => import('./Pages/Admin/ecommerce/Invoices.vue'),
        name: 'admin-ecommerce-invoices',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/shop',
        component: () => import('./Pages/Admin/ecommerce/Shop.vue'),
        name: 'admin-ecommerce-shop',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/shop-2',
        component: () => import('./Pages/Admin/ecommerce/Shop2.vue'),
        name: 'admin-ecommerce-shop-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/product',
        component: () => import('./Pages/Admin/ecommerce/Product.vue'),
        name: 'admin-ecommerce-product',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/cart',
        component: () => import('./Pages/Admin/ecommerce/Cart.vue'),
        name: 'admin-ecommerce-cart',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/cart-2',
        component: () => import('./Pages/Admin/ecommerce/Cart2.vue'),
        name: 'admin-ecommerce-cart-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/cart-3',
        component: () => import('./Pages/Admin/ecommerce/Cart3.vue'),
        name: 'admin-ecommerce-cart-3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/ecommerce/pay',
        component: () => import('./Pages/Admin/ecommerce/Pay.vue'),
        name: 'admin-ecommerce-pay',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/users-1',
        component: () => import('./Pages/Admin/community/UsersTabs.vue'),
        name: 'admin-community-users-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/users-2',
        component: () => import('./Pages/Admin/community/UsersTiles.vue'),
        name: 'admin-community-users-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/profile',
        component: () => import('./Pages/Admin/community/Profile.vue'),
        name: 'admin-community-profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/feed',
        component: () => import('./Pages/Admin/community/Feed.vue'),
        name: 'admin-community-feed',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/forum',
        component: () => import('./Pages/Admin/community/Forum.vue'),
        name: 'admin-community-forum',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/post',
        component: () => import('./Pages/Admin/community/ForumPost.vue'),
        name: 'admin-community-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/meetups-1',
        component: () => import('./Pages/Admin/community/Meetups.vue'),
        name: 'admin-community-meetups-1',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/community/meetups-2',
        component: () => import('./Pages/Admin/community/MeetupsPost.vue'),
        name: 'admin-community-meetups-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/finance/cards',
        component: () => import('./Pages/Admin/finance/CreditCards.vue'),
        name: 'admin-finance-cards',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/finance/transactions',
        component: () => import('./Pages/Admin/finance/Transactions.vue'),
        name: 'admin-finance-transactions',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/finance/transaction-2',
        component: () => import('./Pages/Admin/finance/TransactionDetails.vue'),
        name: 'admin-finance-transaction-2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/job/listing',
        component: () => import('./Pages/Admin/job/JobListing.vue'),
        name: 'admin-job-listing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/job/post',
        component: () => import('./Pages/Admin/job/JobPost.vue'),
        name: 'admin-job-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/job/company',
        component: () => import('./Pages/Admin/job/CompanyProfile.vue'),
        name: 'admin-job-company',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/tasks/kanban',
        component: () => import('./Pages/Admin/tasks/TasksKanban.vue'),
        name: 'admin-tasks-kanban',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/tasks/list',
        component: () => import('./Pages/Admin/tasks/TasksList.vue'),
        name: 'admin-tasks-list',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/account',
        component: () => import('./Pages/Admin/settings/Account.vue'),
        name: 'admin-settings-account',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/notifications',
        component: () => import('./Pages/Admin/settings/Notifications.vue'),
        name: 'admin-settings-notifications',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/apps',
        component: () => import('./Pages/Admin/settings/Apps.vue'),
        name: 'admin-settings-apps',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/plans',
        component: () => import('./Pages/Admin/settings/Plans.vue'),
        name: 'admin-settings-plans',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/billing',
        component: () => import('./Pages/Admin/settings/Billing.vue'),
        name: 'admin-settings-billing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/settings/feedback',
        component: () => import('./Pages/Admin/settings/Feedback.vue'),
        name: 'admin-settings-feedback',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/changelog',
        component: () => import('./Pages/Admin/utility/Changelog.vue'),
        name: 'admin-utility-changelog',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/roadmap',
        component: () => import('./Pages/Admin/utility/Roadmap.vue'),
        name: 'admin-utility-roadmap',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/faqs',
        component: () => import('./Pages/Admin/utility/Faqs.vue'),
        name: 'admin-utility-faqs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/empty',
        component: () => import('./Pages/Admin/utility/EmptyState.vue'),
        name: 'admin-utility-empty',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/404',
        component: () => import('./Pages/Admin/utility/PageNotFound.vue'),
        name: 'admin-utility-404',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/utility/knowledge',
        component: () => import('./Pages/Admin/utility/KnowledgeBase.vue'),
        name: 'admin-utility-knowledge',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/button',
        component: () => import('./Pages/Admin/component/ButtonPage.vue'),
        name: 'admin-component-button',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/form',
        component: () => import('./Pages/Admin/component/FormPage.vue'),
        name: 'admin-component-form',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/dropdown',
        component: () => import('./Pages/Admin/component/DropdownPage.vue'),
        name: 'admin-component-dropdown',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/alert',
        component: () => import('./Pages/Admin/component/AlertPage.vue'),
        name: 'admin-component-alert',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/modal',
        component: () => import('./Pages/Admin/component/ModalPage.vue'),
        name: 'admin-component-modal',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/pagination',
        component: () => import('./Pages/Admin/component/PaginationPage.vue'),
        name: 'admin-component-pagination',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/tabs',
        component: () => import('./Pages/Admin/component/TabsPage.vue'),
        name: 'admin-component-tabs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/breadcrumb',
        component: () => import('./Pages/Admin/component/BreadcrumbPage.vue'),
        name: 'admin-component-breadcrumb',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/badge',
        component: () => import('./Pages/Admin/component/BadgePage.vue'),
        name: 'admin-component-badge',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/avatar',
        component: () => import('./Pages/Admin/component/AvatarPage.vue'),
        name: 'admin-component-avatar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/tooltip',
        component: () => import('./Pages/Admin/component/TooltipPage.vue'),
        name: 'admin-component-tooltip',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/accordion',
        component: () => import('./Pages/Admin/component/AccordionPage.vue'),
        name: 'admin-component-accordion',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/admin/component/icons',
        component: () => import('./Pages/Admin/component/IconsPage.vue'),
        name: 'admin-component-icons',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/:pathMatch(.*)*',
        component: () => import('./Pages/Admin/utility/PageNotFound.vue'),
        name: 'admin-utility-404',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/logout',
        component: () => import('./Pages/Admin/LogoutComponent.vue'),
        name: 'logout',
        meta: { middleware: ['auth', 'verified'] },
    },
    // Добавьте другие маршруты здесь, если необходимо
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;