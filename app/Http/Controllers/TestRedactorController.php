<?php
namespace App\Http\Controllers;
use App\Models\ComplexSubject;
use App\Models\ComplexTest;
use App\Models\ComplexTestQuestion;
use App\User;
use Illuminate\Http\Request;

class TestRedactorController extends Controller
{


    public function index(){
        $user = \Auth::user();
        $data = array();
        if ($user->privileges > 2){
            $data["tests"] = ComplexTest::all(); // for users greater than teacher
        }
        else {
            $data["tests"] = ComplexTest::byOwner($user->id)->get(); //for teachers
        }
        return view("test_redactor.app", $data);
    }

    public function showMakeNewTest(){
        $subjects = ComplexSubject::all();
        $data = array("subjects" => $subjects);
        return view("test_redactor.make_test", $data);
    }

    public function makeNewTest(Request $request){
        $data = $request->all();
        var_dump($data["time_to_pass"]);
        echo gettype($data["time_to_pass"]);
        if (!isset($data["title"]) or empty($data["title"]) or
            !isset($data["subject"]) or empty($data["subject"] or !is_numeric($data["subject"])
            or !isset($data["time_to_pass"]) or empty($data["time_to_pass"]) or !is_numeric($data["time_to_pass"]) or
                $data["time_to_pass"] == N)){
            return \Redirect::back()->withErrors("Вы заполнили не все поля!");
        }

        $subject = ComplexSubject::byId(intval($data["subject"]))->get()->first();
        if (!$subject){
            return \Redirect::back()->withErrors("Дисциплина не найдена!");
        }

        $test = new ComplexTest();
        $test->title = $data["title"];
        $test->subject_id = $subject->id;
        $test->is_randomized = isset($data["is_randomized"]) and !empty($data["is_randomized"]) and $data["is_randomized"] = "1";
        $test->can_pass = isset($data["can_pass"]) and !empty($data["can_pass"]) and $data["can_pass"] = "1";
        $test->owner_id = \Auth::user()->id;
        $test->time_to_pass = intval($data["time_to_pass"]);




       // var_dump(intval($data["subject"]));

        $test->save();

        $questions = new ComplexTestQuestion();
        $questions->test_id = $test->id;
        $questions->owner_id = $test->owner_id;
        $questions->save();

       // return redirect("/edit_tests");
    }

    public function showEditTest(Request $request, $id){
        $test = ComplexTest::byId($id)->get()->first();
        if (!$test)
            return redirect("/edit_tests");
        if(($test->owner_id == \Auth::user()->id) or \Auth::user()->privileges > 2) {
            $data = array("test" => $test);
            return view("test_redactor.edit_test", $data);
        }
        else return redirect("/edit_tests");
    }

    public function editTest(Request $request, $id){
        $test = ComplexTest::byId($id)->get()->first();
        if (!$test){
            return redirect("/edit_tests");
        }
        if(($test->owner_id == \Auth::user()->id) or \Auth::user()->privileges > 2) {
            $data = $request->all();
            if (!isset($data["title"]) or empty($data["title"]) or
                !isset($data["subject"]) or empty($data["subject"] or !is_numeric($data["subject"]))) {
                return \Redirect::back()->withErrors("Вы заполнили не все поля!");
            }

            $subject = ComplexSubject::byId(intval($data["subject"]))->get()->first();
            if (!$subject) {
                return \Redirect::back()->withErrors("Дисциплина не найдена!");
            }

            $test->title = $data["title"];
            $test->subject_id = $subject->id;
            $test->is_randomized = isset($data["is_randomized"]) and !empty($data["is_randomized"]) and $data["is_randomized"] = "1";
            $test->can_pass = isset($data["can_pass"]) and !empty($data["can_pass"]) and $data["can_pass"] = "1";


            // var_dump(intval($data["subject"]));

            $test->save();

            return redirect("/edit_tests");
        }
        else return redirect("/edit_tests");
    }

    public function showEditQuestions(Request $request, $id){
        $test = ComplexTest::byId($id)->get()->first();
        if (!$test)
            return redirect("/edit_tests");
        if(($test->owner_id == \Auth::user()->id) or \Auth::user()->privileges > 2) {
            $data = array("test" => $test, "questions" => ComplexTestQuestion::byTestId($test->id)->get()->first());
            return view("test_redactor.questions", $data);
        }
        else return redirect("/edit_tests");
    }
}
