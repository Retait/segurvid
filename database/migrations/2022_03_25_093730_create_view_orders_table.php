<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("DROP VIEW IF EXISTS view_order");
        \DB::statement("
        CREATE VIEW view_order AS
        SELECT
            cu.id AS `cuid`,
            cu.code_customer,
            cu.name_customer,
            cu.country_customer,
            cu.city_customer,
            cu.address_customer,
            cu.mobile_customer,
            cu.phone_customer,
            cu.email_customer,
            od.id AS `odid`,
            od.code_order,
            od.date_order,
            od.type_payment,
            od.cost_order,
            od.description_order,
            od.date_accident,
            od.location_accident,
            od.code_partner,
            od.name_partner,
            od.phone_partner,
            od.file_order,
            od.status_order,
            od.user_id,
            od.typeaccident_id,
            od.kin_id,
            od.company_id,
            od.insurance_id,
            od.customer_id,
            od.service_id,
            co.id AS `coid`,
            co.name_company,
            ir.id AS `irid`,
            ir.name_insurance,
            se.id AS `seid`,
            se.name_service
        FROM
            customers cu, orders od, companies co, insurances ir, services se
        WHERE
            cu.id=od.customer_id
        AND
            co.id = od.company_id
        AND
            ir.id = od.insurance_id
        AND
            se.id = od.service_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW IF EXISTS view_order");
    }
}
