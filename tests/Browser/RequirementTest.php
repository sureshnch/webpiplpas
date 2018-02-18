<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RequirementTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateRequirement()
    {
        $admin = \App\User::find(1);
        $requirement = factory('App\Requirement')->make();

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $requirement, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.requirements.index'))
                ->clickLink('Add new')
                ->select("customer_name", $requirement->customer_name)
                ->type("job_id", $requirement->job_id)
                ->type("job_title", $requirement->job_title)
                ->select("job_type", $requirement->job_type)
                ->type("description", $requirement->description)
                ->select("location", $requirement->location)
                ->select("department", $requirement->department)
                ->select("industry", $requirement->industry)
                ->select("job_function", $requirement->job_function)
                ->type("closing_date", $requirement->closing_date)
                ->type("positions", $requirement->positions)
                ->type("skills", $requirement->skills)
                ->select("experience_from_years", $requirement->experience_from_years)
                ->select("experience_from_months", $requirement->experience_from_months)
                ->select("experience_to_years", $requirement->experience_to_years)
                ->select("experience_to_months", $requirement->experience_to_months)
                ->select("salary_range", $requirement->salary_range)
                ->select("availabity", $requirement->availabity)
                ->type("referal_fee", $requirement->referal_fee)
                ->type("point_of_contact", $requirement->point_of_contact)
                ->type("email", $requirement->email)
                ->type("code", $requirement->code)
                ->type("phone_number", $requirement->phone_number)
                ->type("skype_id", $requirement->skype_id)
                ->select('select[name="assigned_to_users[]"]', $relations[0]->id)
                ->select('select[name="assigned_to_users[]"]', $relations[1]->id)
                ->type("comment_box", $requirement->comment_box)
                ->press('Save')
                ->assertRouteIs('admin.requirements.index')
                ->assertSeeIn("tr:last-child td[field-key='customer_name']", $requirement->customer_name)
                ->assertSeeIn("tr:last-child td[field-key='job_id']", $requirement->job_id)
                ->assertSeeIn("tr:last-child td[field-key='job_title']", $requirement->job_title)
                ->assertSeeIn("tr:last-child td[field-key='job_type']", $requirement->job_type)
                ->assertSeeIn("tr:last-child td[field-key='description']", $requirement->description)
                ->assertSeeIn("tr:last-child td[field-key='location']", $requirement->location)
                ->assertSeeIn("tr:last-child td[field-key='department']", $requirement->department)
                ->assertSeeIn("tr:last-child td[field-key='industry']", $requirement->industry)
                ->assertSeeIn("tr:last-child td[field-key='job_function']", $requirement->job_function)
                ->assertSeeIn("tr:last-child td[field-key='closing_date']", $requirement->closing_date)
                ->assertSeeIn("tr:last-child td[field-key='positions']", $requirement->positions)
                ->assertSeeIn("tr:last-child td[field-key='skills']", $requirement->skills)
                ->assertSeeIn("tr:last-child td[field-key='experience_from_years']", $requirement->experience_from_years)
                ->assertSeeIn("tr:last-child td[field-key='experience_from_months']", $requirement->experience_from_months)
                ->assertSeeIn("tr:last-child td[field-key='experience_to_years']", $requirement->experience_to_years)
                ->assertSeeIn("tr:last-child td[field-key='experience_to_months']", $requirement->experience_to_months)
                ->assertSeeIn("tr:last-child td[field-key='salary_range']", $requirement->salary_range)
                ->assertSeeIn("tr:last-child td[field-key='availabity']", $requirement->availabity)
                ->assertSeeIn("tr:last-child td[field-key='referal_fee']", $requirement->referal_fee)
                ->assertSeeIn("tr:last-child td[field-key='point_of_contact']", $requirement->point_of_contact)
                ->assertSeeIn("tr:last-child td[field-key='email']", $requirement->email)
                ->assertSeeIn("tr:last-child td[field-key='code']", $requirement->code)
                ->assertSeeIn("tr:last-child td[field-key='phone_number']", $requirement->phone_number)
                ->assertSeeIn("tr:last-child td[field-key='skype_id']", $requirement->skype_id)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:last-child", $relations[1]->name)
                ->assertSeeIn("tr:last-child td[field-key='comment_box']", $requirement->comment_box);
        });
    }

    public function testEditRequirement()
    {
        $admin = \App\User::find(1);
        $requirement = factory('App\Requirement')->create();
        $requirement2 = factory('App\Requirement')->make();

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $requirement, $requirement2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.requirements.index'))
                ->click('tr[data-entry-id="' . $requirement->id . '"] .btn-info')
                ->select("customer_name", $requirement2->customer_name)
                ->type("job_id", $requirement2->job_id)
                ->type("job_title", $requirement2->job_title)
                ->select("job_type", $requirement2->job_type)
                ->type("description", $requirement2->description)
                ->select("location", $requirement2->location)
                ->select("department", $requirement2->department)
                ->select("industry", $requirement2->industry)
                ->select("job_function", $requirement2->job_function)
                ->type("closing_date", $requirement2->closing_date)
                ->type("positions", $requirement2->positions)
                ->type("skills", $requirement2->skills)
                ->select("experience_from_years", $requirement2->experience_from_years)
                ->select("experience_from_months", $requirement2->experience_from_months)
                ->select("experience_to_years", $requirement2->experience_to_years)
                ->select("experience_to_months", $requirement2->experience_to_months)
                ->select("salary_range", $requirement2->salary_range)
                ->select("availabity", $requirement2->availabity)
                ->type("referal_fee", $requirement2->referal_fee)
                ->type("point_of_contact", $requirement2->point_of_contact)
                ->type("email", $requirement2->email)
                ->type("code", $requirement2->code)
                ->type("phone_number", $requirement2->phone_number)
                ->type("skype_id", $requirement2->skype_id)
                ->select('select[name="assigned_to_users[]"]', $relations[0]->id)
                ->select('select[name="assigned_to_users[]"]', $relations[1]->id)
                ->type("comment_box", $requirement2->comment_box)
                ->press('Update')
                ->assertRouteIs('admin.requirements.index')
                ->assertSeeIn("tr:last-child td[field-key='customer_name']", $requirement2->customer_name)
                ->assertSeeIn("tr:last-child td[field-key='job_id']", $requirement2->job_id)
                ->assertSeeIn("tr:last-child td[field-key='job_title']", $requirement2->job_title)
                ->assertSeeIn("tr:last-child td[field-key='job_type']", $requirement2->job_type)
                ->assertSeeIn("tr:last-child td[field-key='description']", $requirement2->description)
                ->assertSeeIn("tr:last-child td[field-key='location']", $requirement2->location)
                ->assertSeeIn("tr:last-child td[field-key='department']", $requirement2->department)
                ->assertSeeIn("tr:last-child td[field-key='industry']", $requirement2->industry)
                ->assertSeeIn("tr:last-child td[field-key='job_function']", $requirement2->job_function)
                ->assertSeeIn("tr:last-child td[field-key='closing_date']", $requirement2->closing_date)
                ->assertSeeIn("tr:last-child td[field-key='positions']", $requirement2->positions)
                ->assertSeeIn("tr:last-child td[field-key='skills']", $requirement2->skills)
                ->assertSeeIn("tr:last-child td[field-key='experience_from_years']", $requirement2->experience_from_years)
                ->assertSeeIn("tr:last-child td[field-key='experience_from_months']", $requirement2->experience_from_months)
                ->assertSeeIn("tr:last-child td[field-key='experience_to_years']", $requirement2->experience_to_years)
                ->assertSeeIn("tr:last-child td[field-key='experience_to_months']", $requirement2->experience_to_months)
                ->assertSeeIn("tr:last-child td[field-key='salary_range']", $requirement2->salary_range)
                ->assertSeeIn("tr:last-child td[field-key='availabity']", $requirement2->availabity)
                ->assertSeeIn("tr:last-child td[field-key='referal_fee']", $requirement2->referal_fee)
                ->assertSeeIn("tr:last-child td[field-key='point_of_contact']", $requirement2->point_of_contact)
                ->assertSeeIn("tr:last-child td[field-key='email']", $requirement2->email)
                ->assertSeeIn("tr:last-child td[field-key='code']", $requirement2->code)
                ->assertSeeIn("tr:last-child td[field-key='phone_number']", $requirement2->phone_number)
                ->assertSeeIn("tr:last-child td[field-key='skype_id']", $requirement2->skype_id)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:last-child", $relations[1]->name)
                ->assertSeeIn("tr:last-child td[field-key='comment_box']", $requirement2->comment_box);
        });
    }

    public function testShowRequirement()
    {
        $admin = \App\User::find(1);
        $requirement = factory('App\Requirement')->create();

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $requirement->assigned_to_users()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $requirement, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.requirements.index'))
                ->click('tr[data-entry-id="' . $requirement->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='customer_name']", $requirement->customer_name)
                ->assertSeeIn("td[field-key='job_id']", $requirement->job_id)
                ->assertSeeIn("td[field-key='job_title']", $requirement->job_title)
                ->assertSeeIn("td[field-key='job_type']", $requirement->job_type)
                ->assertSeeIn("td[field-key='description']", $requirement->description)
                ->assertSeeIn("td[field-key='location']", $requirement->location)
                ->assertSeeIn("td[field-key='department']", $requirement->department)
                ->assertSeeIn("td[field-key='industry']", $requirement->industry)
                ->assertSeeIn("td[field-key='job_function']", $requirement->job_function)
                ->assertSeeIn("td[field-key='closing_date']", $requirement->closing_date)
                ->assertSeeIn("td[field-key='positions']", $requirement->positions)
                ->assertSeeIn("td[field-key='skills']", $requirement->skills)
                ->assertSeeIn("td[field-key='experience_from_years']", $requirement->experience_from_years)
                ->assertSeeIn("td[field-key='experience_from_months']", $requirement->experience_from_months)
                ->assertSeeIn("td[field-key='experience_to_years']", $requirement->experience_to_years)
                ->assertSeeIn("td[field-key='experience_to_months']", $requirement->experience_to_months)
                ->assertSeeIn("td[field-key='salary_range']", $requirement->salary_range)
                ->assertSeeIn("td[field-key='availabity']", $requirement->availabity)
                ->assertSeeIn("td[field-key='referal_fee']", $requirement->referal_fee)
                ->assertSeeIn("td[field-key='point_of_contact']", $requirement->point_of_contact)
                ->assertSeeIn("td[field-key='email']", $requirement->email)
                ->assertSeeIn("td[field-key='code']", $requirement->code)
                ->assertSeeIn("td[field-key='phone_number']", $requirement->phone_number)
                ->assertSeeIn("td[field-key='skype_id']", $requirement->skype_id)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='assigned_to_users'] span:last-child", $relations[1]->name)
                ->assertSeeIn("td[field-key='comment_box']", $requirement->comment_box)
                ->assertSeeIn("td[field-key='created_by']", $requirement->created_by->name);
        });
    }

}
