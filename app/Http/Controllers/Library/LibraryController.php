<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Grade;
use App\Models\Library;
use App\Repository\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
     public $library;
    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library =$library;
    }

    public function index()
    {
        $books =Library::all();
        return view('library.index',compact('books'));
    }


    public function create()
    {
        $grades =Grade::all();
        return view('library.create',compact('grades'));

    }


    public function store(BookStoreRequest $request)
    {
        $this->library->store($request);
        toastr()->success('تم حفظ البيانات');
        return redirect()->route('library.index');
    }
   public function download_file($name)
   {
       return response()->download(storage_path('app/library/attachments/'.$name));
   }

    public function show(string $id)
    {
        //
    }


    public function edit( $id)
    {
        $book =Library::findOrFail($id);
        $grades =Grade::all();
        return view('library.edit',compact('grades','book'));

    }


    public function update(BookUpdateRequest $request)
    {
        $this->library->update($request);
        toastr()->success('تم تعديل البيانات');
        return redirect()->route('library.index');
    }


    public function destroy(Request $request)
    {
        $this->library->delete($request);
        toastr()->error('تم حذف البيانات');
        return redirect()->route('library.index');
    }
}
