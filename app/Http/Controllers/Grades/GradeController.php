<?php 

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use Flasher\Toastr\Prime\ToastrFactory;


class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all(); 
    return view('pages.grades.index', compact('grades'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGradeRequest $request, ToastrFactory $flasher)
  {
    try{
    $validated = $request->validated();
    $grade = new Grade();

    $grade->name = ['en' => $request->Name_en, 'ar' => $request->Name];
    $grade->notes = $request->Notes;
    $grade->save();
    $flasher->addSuccess('messages.success');    
    return redirect()->route('grades.index');

    } catch(\Exception $e) {
      return redirect()->back()->withError(['error' => $e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>