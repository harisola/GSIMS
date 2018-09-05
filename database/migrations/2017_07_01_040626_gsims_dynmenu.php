<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GsimsDynmenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /***** Dynamic Group *****/
        Schema::connection('mysql')->create('dyn_group', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('name')->unique();
            $table->string('title');


            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });




        /***** Dynamic Menu *****/
        Schema::connection('mysql')->create('dyn_menu', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('title');
            $table->string('a1')->nullable();
            $table->string('a2')->nullable();
            $table->string('a3')->nullable();
            $table->string('a4')->nullable();
            $table->string('a5')->nullable();
            $table->string('link_type');
            $table->integer('page_id')->unsigned();
            $table->string('module_name');
            $table->string('url');
            $table->string('uri');
            $table->integer('dyn_group_id')->unsigned();
            $table->bigInteger('position');
            $table->string('target');
            $table->integer('parent_id');
            $table->boolean('is_parent')->default(0);
            $table->boolean('show_menu')->default(0);
            $table->string('dtitle');
            $table->string('title_note');
            $table->string('font_class');
            $table->string('font_icon');
            $table->string('page_header_big_words');
            $table->string('page_header_small_words');


            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        Schema::connection('mysql')->table('dyn_menu', function (Blueprint $table) {
            $table->foreign('dyn_group_id')->references('id')->on('dyn_group');
        });









        /***** Role Menus *****/
        Schema::connection('mysql')->create('role_menus', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('dyn_menu_id')->unsigned();

            $table->boolean('menu_visible')->default(0);
            $table->boolean('can_create')->default(0);
            $table->boolean('can_read')->default(0);
            $table->boolean('can_update')->default(0);
            $table->boolean('can_delete')->default(0);
            $table->boolean('can_approve')->default(0);
            $table->boolean('can_print')->default(0);
            $table->boolean('can_export')->default(0);

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        Schema::connection('mysql')->table('role_menus', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('dyn_menu_id')->references('id')->on('dyn_menu');
        });










        /********************************************* Seeding *********************************************/
        /***************************************************************************************************/
        /********************************************************************************* Menu Groups *****/
        DB::connection('mysql')->table('dyn_group')->insert([
            [
                'name' => 'Header',
                'title' => 'Header',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'name' => 'Topbar',
                'title' => 'Topbar',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'name' => 'Sidebar Left',
                'title' => 'Sidebar Left',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'name' => 'Sidebar Right',
                'title' => 'Sidebar Right',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'name' => 'Footer',
                'title' => 'Footer',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ]
        ]);




        /*************************************************************************************** Menus *****/
        $tableArray = array(
            /***************************************************** My Process - Menus **********/
            array(
                'title' => 'My Process',
                'a1' => 'My Process',
                'a2' => '',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'link_type' => 'Group',
                'page_id' => 0,
                'module_name' => '',
                'url' => '',
                'uri' => '',
                'dyn_group_id' => 3,
                'position' => 90000000000,
                'target' => '', //_blank
                'parent_id' => 0,
                'is_parent' => 1,
                'show_menu' => 1,
                'dtitle' => 'My Process',
                'title_note' => '',
                'font_class' => 'fa',
                'font_icon' => 'fa-files-o',
                'page_header_big_words' => '',
                'page_header_small_words' => '',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ),
            /***************************************************** My Reports - Menus **********/
            array(
                'title' => 'My Reports',
                'a1' => 'My Reports',
                'a2' => '',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'link_type' => 'Group',
                'page_id' => 0,
                'module_name' => '',
                'url' => '',
                'uri' => '',
                'dyn_group_id' => 3,
                'position' => 91000000000,
                'target' => '', //_blank
                'parent_id' => 0,
                'is_parent' => 1,
                'show_menu' => 1,
                'dtitle' => 'My Reports',
                'title_note' => '',
                'font_class' => '',
                'font_icon' => 'icon-briefcase',
                'page_header_big_words' => '',
                'page_header_small_words' => '',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ),







            /***************************************************** My Process - Admission **********/
            array(
                'title' => 'Admission',
                'a1' => 'My Process',
                'a2' => 'Admission',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'link_type' => 'Group',
                'page_id' => 0,
                'module_name' => '',
                'url' => '',
                'uri' => '',
                'dyn_group_id' => 3,
                'position' => 90010000000,
                'target' => '', //_blank
                'parent_id' => 1,
                'is_parent' => 1,
                'show_menu' => 1,
                'dtitle' => 'Admission',
                'title_note' => '',
                'font_class' => '',
                'font_icon' => '',
                'page_header_big_words' => '',
                'page_header_small_words' => '',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ),
                /***************************************************** My Process - Admission - Form Issuance **********/
                array(
                    'title' => 'Form Issuance',
                    'a1' => 'My Process',
                    'a2' => 'Admission',
                    'a3' => 'Form Issuance',
                    'a4' => '',
                    'a5' => '',
                    'link_type' => 'Group',
                    'page_id' => 0,
                    'module_name' => '',
                    'url' => '',
                    'uri' => '',
                    'dyn_group_id' => 3,
                    'position' => 90010100000,
                    'target' => '', //_blank
                    'parent_id' => 3,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'dtitle' => 'Form Issuance',
                    'title_note' => '',
                    'font_class' => '',
                    'font_icon' => '',
                    'page_header_big_words' => '',
                    'page_header_small_words' => '',
                    'created' => Carbon::now()->timestamp,
                    'register_by' => 1,
                    'modified' => Carbon::now()->timestamp,
                    'modified_by' => 1,
                    'record_deleted' => 0
                ),










            /***************************************************** My Reports - E-Tab **********/
            array(
                'title' => 'E-Tab',
                'a1' => 'My Reports',
                'a2' => 'E-Tab',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'link_type' => 'Group',
                'page_id' => 0,
                'module_name' => '',
                'url' => '',
                'uri' => '',
                'dyn_group_id' => 3,
                'position' => 91010000000,
                'target' => '', //_blank
                'parent_id' => 2,
                'is_parent' => 1,
                'show_menu' => 1,
                'dtitle' => 'E-Tab',
                'title_note' => '',
                'font_class' => '',
                'font_icon' => '',
                'page_header_big_words' => '',
                'page_header_small_words' => '',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ),
                /***************************************************** My Reports - E-Tab - Subect Report **********/
                array(
                    'title' => 'Subject Report',
                    'a1' => 'My Reports',
                    'a2' => 'E-Tab',
                    'a3' => 'Subject Report',
                    'a4' => '',
                    'a5' => '',
                    'link_type' => 'Group',
                    'page_id' => 0,
                    'module_name' => '',
                    'url' => 'etab_subject_report',
                    'uri' => '',
                    'dyn_group_id' => 3,
                    'position' => 91010100000,
                    'target' => '', //_blank
                    'parent_id' => 5,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'dtitle' => 'Subject Report',
                    'title_note' => '',
                    'font_class' => '',
                    'font_icon' => '',
                    'page_header_big_words' => '',
                    'page_header_small_words' => '',
                    'created' => Carbon::now()->timestamp,
                    'register_by' => 1,
                    'modified' => Carbon::now()->timestamp,
                    'modified_by' => 1,
                    'record_deleted' => 0
                ),
                /***************************************************** My Reports - E-Tab - Class Report **********/
                array(
                    'title' => 'Class Report',
                    'a1' => 'My Reports',
                    'a2' => 'E-Tab',
                    'a3' => 'Class Report',
                    'a4' => '',
                    'a5' => '',
                    'link_type' => 'Group',
                    'page_id' => 0,
                    'module_name' => '',
                    'url' => '',
                    'uri' => '',
                    'dyn_group_id' => 3,
                    'position' => 91010200000,
                    'target' => '', //_blank
                    'parent_id' => 5,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'dtitle' => 'Class Report',
                    'title_note' => '',
                    'font_class' => '',
                    'font_icon' => '',
                    'page_header_big_words' => '',
                    'page_header_small_words' => '',
                    'created' => Carbon::now()->timestamp,
                    'register_by' => 1,
                    'modified' => Carbon::now()->timestamp,
                    'modified_by' => 1,
                    'record_deleted' => 0
                ),
                /***************************************************** My Reports - E-Tab - Student's Report **********/
                array(
                    'title' => 'Student Report',
                    'a1' => 'My Reports',
                    'a2' => 'E-Tab',
                    'a3' => 'Student Report',
                    'a4' => '',
                    'a5' => '',
                    'link_type' => 'Group',
                    'page_id' => 0,
                    'module_name' => '',
                    'url' => '',
                    'uri' => '',
                    'dyn_group_id' => 3,
                    'position' => 91010300000,
                    'target' => '', //_blank
                    'parent_id' => 5,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'dtitle' => 'Student Report',
                    'title_note' => '',
                    'font_class' => '',
                    'font_icon' => '',
                    'page_header_big_words' => '',
                    'page_header_small_words' => '',
                    'created' => Carbon::now()->timestamp,
                    'register_by' => 1,
                    'modified' => Carbon::now()->timestamp,
                    'modified_by' => 1,
                    'record_deleted' => 0
                ),


            /***************************************************** My Reports - HR **********/
            array(
                'title' => 'H R',
                'a1' => 'My Reports',
                'a2' => 'H R',
                'a3' => '',
                'a4' => '',
                'a5' => '',
                'link_type' => 'Group',
                'page_id' => 0,
                'module_name' => '',
                'url' => '',
                'uri' => '',
                'dyn_group_id' => 3,
                'position' => 91020000000,
                'target' => '', //_blank
                'parent_id' => 2,
                'is_parent' => 1,
                'show_menu' => 1,
                'dtitle' => 'H R',
                'title_note' => '',
                'font_class' => '',
                'font_icon' => '',
                'page_header_big_words' => '',
                'page_header_small_words' => '',
                'created' => Carbon::now()->timestamp,
                'register_by' => 1,
                'modified' => Carbon::now()->timestamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ),
                /***************************************************** My Reports - HR - Attendance **********/
                array(
                    'title' => 'Attendance',
                    'a1' => 'My Reports',
                    'a2' => 'H R',
                    'a3' => 'Attendance',
                    'a4' => '',
                    'a5' => '',
                    'link_type' => 'Group',
                    'page_id' => 0,
                    'module_name' => '',
                    'url' => '',
                    'uri' => '',
                    'dyn_group_id' => 3,
                    'position' => 91020100000,
                    'target' => '', //_blank
                    'parent_id' => 9,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'dtitle' => 'Attendance',
                    'title_note' => '',
                    'font_class' => '',
                    'font_icon' => '',
                    'page_header_big_words' => '',
                    'page_header_small_words' => '',
                    'created' => Carbon::now()->timestamp,
                    'register_by' => 1,
                    'modified' => Carbon::now()->timestamp,
                    'modified_by' => 1,
                    'record_deleted' => 0
                ),
        );



        DB::connection('mysql')->table('dyn_menu')->insert($tableArray);










        /*************************************************************************************** Role - Menus *****/
        $CreatedAt = Carbon::now()->timestamp;
        $ModifiedAt = $CreatedAt;

        $dataArray = array();
        for($i=1; $i<=count($tableArray); $i++){
            array_push($dataArray, array(
                    'role_id' => 1,
                    'dyn_menu_id' => $i,
                    'menu_visible' => 1,
                    'can_create' => 1,
                    'can_read' => 1,
                    'can_update' => 1,
                    'can_delete' => 1,
                    'can_approve' => 1,
                    'can_print' => 1,
                    'can_export' => 1,
                    'created' => $CreatedAt,
                    'register_by' => 1,
                    'modified' => $ModifiedAt,
                    'modified_by' => 1,
                    'record_deleted' => 0));
        }
        DB::connection('mysql')->table('role_menus')->insert($dataArray);













        /*************************************************************************** Stored Procedures *****/
        $procedure = "
            CREATE PROCEDURE `sp_getUserMenu` (userID INT)
            BEGIN
                select
                m.*,
                IF(m.a5 != '', m.a5,
                    IF(m.a4!='', m.a4,
                    IF(m.a3!='', m.a3,
                    IF(m.a2!='', m.a2,
                    IF(m.a1!='', m.a1, ''))))) as dtitle

                from (select
                    m.id, m.title, m.link_type, m.page_id, m.module_name, m.url, m.uri,
                    m.position, m.target, m.parent_id, m.is_parent, m.show_menu,
                    m.title_note, m.font_class, m.font_icon,
                    m.page_header_big_words, m.page_header_small_words,
                    m.a1, m.a2, m.a3, m.a4, m.a5
                    
                from role_users as u
                left join users as ur
                    on ur.id = UserID
                left join role_menus as r
                    on r.role_id = u.role_id
                left join dyn_menu as m
                    on m.id = r.dyn_menu_id

                where r.record_deleted=0
                and m.show_menu=1
                and m.record_deleted=0
                and m.dyn_group_id=3
                and u.user_id=UserID
                     
                group by m.id) as m

                order by m.position;
            END";
        DB::connection('mysql')->unprepared("DROP procedure IF EXISTS sp_getUserMenu");
        DB::connection('mysql')->unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->drop('role_menus');
        Schema::connection('mysql')->drop('dyn_menu');
        Schema::connection('mysql')->drop('dyn_group');
    }
}
