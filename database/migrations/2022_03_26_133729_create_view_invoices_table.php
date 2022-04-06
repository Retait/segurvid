<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("DROP VIEW IF EXISTS view_invoice");
        \DB::statement("
        CREATE VIEW view_invoice AS
        SELECT
            us.id AS `usid`,
            us.name,
            us.profile_photo_path,
            cu.id AS `cuid`,
            cu.code_customer,
            cu.name_customer,
            cu.country_customer,
            cu.city_customer,
            cu.mobile_customer,
            od.id AS `odid`,
            od.code_order,
            od.date_order,
            od.cost_order,
            iv.id AS `ivid`,
            iv.code_invoice,
            month (iv.date_invoice) as `month`,
            year (iv.date_invoice) as `year`,
            iv.date_invoice,
            iv.subtotal_invoice,
            iv.discount_invoice,
            iv.tax_invoice,
            iv.total_invoice,
            iv.deposit_invoice,
            co.id AS `coid`,
            co.name_company,
            se.id AS `seid`,
            se.code_service,
            se.name_service,
            ic.id AS `icid`,
            ic.name_insurance,
            pa.id AS `paid`,
            pa.name_payment
        FROM
            users us, customers cu, orders od, invoices iv, companies co, services se, insurances ic, payments pa
        WHERE
            cu.id = od.customer_id
        AND
            co.id = od.company_id
        AND
            se.id = od.service_id
        AND
            ic.id = od.insurance_id
        AND
            od.id = iv.order_id
        AND
            us.id = iv.user_id
        AND
            pa.id = iv.payment_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW IF EXISTS view_invoice");
    }
}
