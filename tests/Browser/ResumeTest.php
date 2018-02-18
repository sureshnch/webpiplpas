<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ResumeTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateResume()
    {
        $admin = \App\User::find(1);
        $resume = factory('App\Resume')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $resume) {
            $browser->loginAs($admin)
                ->visit(route('admin.resumes.index'))
                ->clickLink('Add new')
                ->type("first_name", $resume->first_name)
                ->type("last_name", $resume->last_name)
                ->type("email", $resume->email)
                ->type("code", $resume->code)
                ->type("mobile_number", $resume->mobile_number)
                ->type("pancard", $resume->pancard)
                ->type("address", $resume->address)
                ->type("city", $resume->city)
                ->type("state", $resume->state)
                ->type("country", $resume->country)
                ->type("educational_qualification", $resume->educational_qualification)
                ->select("primary_skills", $resume->primary_skills)
                ->type("sub_skills", $resume->sub_skills)
                ->select("work_experience_years", $resume->work_experience_years)
                ->select("work_experience_months", $resume->work_experience_months)
                ->type("relevant_experience", $resume->relevant_experience)
                ->type("notice_period", $resume->notice_period)
                ->type("prefered_location", $resume->prefered_location)
                ->select("current_ctc_lacks", $resume->current_ctc_lacks)
                ->select("current_ctc_thousands", $resume->current_ctc_thousands)
                ->select("expected_ctc_lacks", $resume->expected_ctc_lacks)
                ->select("expected_ctc_thousands", $resume->expected_ctc_thousands)
                ->attach("upload_resume", base_path("tests/_resources/test.jpg"))
                ->type("comment_box", $resume->comment_box)
                ->press('Save')
                ->assertRouteIs('admin.resumes.index')
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $resume->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $resume->last_name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $resume->email)
                ->assertSeeIn("tr:last-child td[field-key='code']", $resume->code)
                ->assertSeeIn("tr:last-child td[field-key='mobile_number']", $resume->mobile_number)
                ->assertSeeIn("tr:last-child td[field-key='pancard']", $resume->pancard)
                ->assertSeeIn("tr:last-child td[field-key='address']", $resume->address)
                ->assertSeeIn("tr:last-child td[field-key='city']", $resume->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $resume->state)
                ->assertSeeIn("tr:last-child td[field-key='country']", $resume->country)
                ->assertSeeIn("tr:last-child td[field-key='educational_qualification']", $resume->educational_qualification)
                ->assertSeeIn("tr:last-child td[field-key='primary_skills']", $resume->primary_skills)
                ->assertSeeIn("tr:last-child td[field-key='sub_skills']", $resume->sub_skills)
                ->assertSeeIn("tr:last-child td[field-key='work_experience_years']", $resume->work_experience_years)
                ->assertSeeIn("tr:last-child td[field-key='work_experience_months']", $resume->work_experience_months)
                ->assertSeeIn("tr:last-child td[field-key='relevant_experience']", $resume->relevant_experience)
                ->assertSeeIn("tr:last-child td[field-key='notice_period']", $resume->notice_period)
                ->assertSeeIn("tr:last-child td[field-key='prefered_location']", $resume->prefered_location)
                ->assertSeeIn("tr:last-child td[field-key='current_ctc_lacks']", $resume->current_ctc_lacks)
                ->assertSeeIn("tr:last-child td[field-key='current_ctc_thousands']", $resume->current_ctc_thousands)
                ->assertSeeIn("tr:last-child td[field-key='expected_ctc_lacks']", $resume->expected_ctc_lacks)
                ->assertSeeIn("tr:last-child td[field-key='expected_ctc_thousands']", $resume->expected_ctc_thousands)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Resume::first()->upload_resume . "']")
                ->assertSeeIn("tr:last-child td[field-key='comment_box']", $resume->comment_box);
        });
    }

    public function testEditResume()
    {
        $admin = \App\User::find(1);
        $resume = factory('App\Resume')->create();
        $resume2 = factory('App\Resume')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $resume, $resume2) {
            $browser->loginAs($admin)
                ->visit(route('admin.resumes.index'))
                ->click('tr[data-entry-id="' . $resume->id . '"] .btn-info')
                ->type("first_name", $resume2->first_name)
                ->type("last_name", $resume2->last_name)
                ->type("email", $resume2->email)
                ->type("code", $resume2->code)
                ->type("mobile_number", $resume2->mobile_number)
                ->type("pancard", $resume2->pancard)
                ->type("address", $resume2->address)
                ->type("city", $resume2->city)
                ->type("state", $resume2->state)
                ->type("country", $resume2->country)
                ->type("educational_qualification", $resume2->educational_qualification)
                ->select("primary_skills", $resume2->primary_skills)
                ->type("sub_skills", $resume2->sub_skills)
                ->select("work_experience_years", $resume2->work_experience_years)
                ->select("work_experience_months", $resume2->work_experience_months)
                ->type("relevant_experience", $resume2->relevant_experience)
                ->type("notice_period", $resume2->notice_period)
                ->type("prefered_location", $resume2->prefered_location)
                ->select("current_ctc_lacks", $resume2->current_ctc_lacks)
                ->select("current_ctc_thousands", $resume2->current_ctc_thousands)
                ->select("expected_ctc_lacks", $resume2->expected_ctc_lacks)
                ->select("expected_ctc_thousands", $resume2->expected_ctc_thousands)
                ->attach("upload_resume", base_path("tests/_resources/test.jpg"))
                ->type("comment_box", $resume2->comment_box)
                ->press('Update')
                ->assertRouteIs('admin.resumes.index')
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $resume2->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $resume2->last_name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $resume2->email)
                ->assertSeeIn("tr:last-child td[field-key='code']", $resume2->code)
                ->assertSeeIn("tr:last-child td[field-key='mobile_number']", $resume2->mobile_number)
                ->assertSeeIn("tr:last-child td[field-key='pancard']", $resume2->pancard)
                ->assertSeeIn("tr:last-child td[field-key='address']", $resume2->address)
                ->assertSeeIn("tr:last-child td[field-key='city']", $resume2->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $resume2->state)
                ->assertSeeIn("tr:last-child td[field-key='country']", $resume2->country)
                ->assertSeeIn("tr:last-child td[field-key='educational_qualification']", $resume2->educational_qualification)
                ->assertSeeIn("tr:last-child td[field-key='primary_skills']", $resume2->primary_skills)
                ->assertSeeIn("tr:last-child td[field-key='sub_skills']", $resume2->sub_skills)
                ->assertSeeIn("tr:last-child td[field-key='work_experience_years']", $resume2->work_experience_years)
                ->assertSeeIn("tr:last-child td[field-key='work_experience_months']", $resume2->work_experience_months)
                ->assertSeeIn("tr:last-child td[field-key='relevant_experience']", $resume2->relevant_experience)
                ->assertSeeIn("tr:last-child td[field-key='notice_period']", $resume2->notice_period)
                ->assertSeeIn("tr:last-child td[field-key='prefered_location']", $resume2->prefered_location)
                ->assertSeeIn("tr:last-child td[field-key='current_ctc_lacks']", $resume2->current_ctc_lacks)
                ->assertSeeIn("tr:last-child td[field-key='current_ctc_thousands']", $resume2->current_ctc_thousands)
                ->assertSeeIn("tr:last-child td[field-key='expected_ctc_lacks']", $resume2->expected_ctc_lacks)
                ->assertSeeIn("tr:last-child td[field-key='expected_ctc_thousands']", $resume2->expected_ctc_thousands)
                ->assertVisible("a[href='" . env("APP_URL") . "/" . env("UPLOAD_PATH") . "/" . \App\Resume::first()->upload_resume . "']")
                ->assertSeeIn("tr:last-child td[field-key='comment_box']", $resume2->comment_box);
        });
    }

    public function testShowResume()
    {
        $admin = \App\User::find(1);
        $resume = factory('App\Resume')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $resume) {
            $browser->loginAs($admin)
                ->visit(route('admin.resumes.index'))
                ->click('tr[data-entry-id="' . $resume->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='first_name']", $resume->first_name)
                ->assertSeeIn("td[field-key='last_name']", $resume->last_name)
                ->assertSeeIn("td[field-key='email']", $resume->email)
                ->assertSeeIn("td[field-key='code']", $resume->code)
                ->assertSeeIn("td[field-key='mobile_number']", $resume->mobile_number)
                ->assertSeeIn("td[field-key='pancard']", $resume->pancard)
                ->assertSeeIn("td[field-key='address']", $resume->address)
                ->assertSeeIn("td[field-key='city']", $resume->city)
                ->assertSeeIn("td[field-key='state']", $resume->state)
                ->assertSeeIn("td[field-key='country']", $resume->country)
                ->assertSeeIn("td[field-key='educational_qualification']", $resume->educational_qualification)
                ->assertSeeIn("td[field-key='primary_skills']", $resume->primary_skills)
                ->assertSeeIn("td[field-key='sub_skills']", $resume->sub_skills)
                ->assertSeeIn("td[field-key='work_experience_years']", $resume->work_experience_years)
                ->assertSeeIn("td[field-key='work_experience_months']", $resume->work_experience_months)
                ->assertSeeIn("td[field-key='relevant_experience']", $resume->relevant_experience)
                ->assertSeeIn("td[field-key='notice_period']", $resume->notice_period)
                ->assertSeeIn("td[field-key='prefered_location']", $resume->prefered_location)
                ->assertSeeIn("td[field-key='current_ctc_lacks']", $resume->current_ctc_lacks)
                ->assertSeeIn("td[field-key='current_ctc_thousands']", $resume->current_ctc_thousands)
                ->assertSeeIn("td[field-key='expected_ctc_lacks']", $resume->expected_ctc_lacks)
                ->assertSeeIn("td[field-key='expected_ctc_thousands']", $resume->expected_ctc_thousands)
                ->assertSeeIn("td[field-key='comment_box']", $resume->comment_box)
                ->assertSeeIn("td[field-key='created_by']", $resume->created_by->name);
        });
    }

}
