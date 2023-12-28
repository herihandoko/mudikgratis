<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopSettingsTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogCommentsTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(ContactMessagesTableSeeder::class);
        $this->call(ContactPagesTableSeeder::class);
        $this->call(CookiesTableSeeder::class);
        $this->call(EmailSettingsTableSeeder::class);
        $this->call(EmailTemplateVariablesTableSeeder::class);
        $this->call(EmailTemplatesTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(FooterContactItemsTableSeeder::class);
        $this->call(FooterInformationTableSeeder::class);
        $this->call(FooterLinksTableSeeder::class);
        $this->call(GoogleAnalyticsTableSeeder::class);
        $this->call(GoogleMapsTableSeeder::class);
        $this->call(GoogleRecaptchasTableSeeder::class);
        $this->call(HeaderContactsTableSeeder::class);
        $this->call(IntrosTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(OrderAddressesTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PageBuildersTableSeeder::class);
        $this->call(PageComponentCategoriesTableSeeder::class);
        $this->call(PageComponentsTableSeeder::class);
        $this->call(PageFootersTableSeeder::class);
        $this->call(PageHeadersTableSeeder::class);
        $this->call(PageItemsTableSeeder::class);
        $this->call(PageLayoutsTableSeeder::class);
        $this->call(ParallaxesTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PaymentGatewaysTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PortfoliosTableSeeder::class);
        $this->call(PrivacyPoliciesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductReviewsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ShippingCountriesTableSeeder::class);
        $this->call(ShopDiscountsTableSeeder::class);
        $this->call(ShopServicesTableSeeder::class);
        $this->call(ShopSettingsTableSeeder::class);
        $this->call(ShopSlidersTableSeeder::class);
        $this->call(ShoppingcartTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(SocialLinksTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(StatisticItemsTableSeeder::class);
        $this->call(StatisticsTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(TermsOfUsesTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(UserAdressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(PermissionGroupsTableSeeder::class);
    }
}
