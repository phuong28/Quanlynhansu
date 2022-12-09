<?php
namespace App\Http\Controllers;
use App\Models\Reason;
use \Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Validator;
class ReasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        return view('admin.reason.index', [
            'reason' =>DB::table('reasons')->paginate(4)
        ]);
    }
    public function create(){
        return view('admin.reason.create');
    }
    public function add(Request $request){
        // $request->validated();
        $data=$request->all();
        $validator = Validator::make([], []);
        if($data['category']=="" || $data['note']==""){
            $validator->errors()->add('error', __('Không được để trống các thông tin.'));
            return redirect('/addreason')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $user = Reason::create([
            'category' => $data['category'],
            'note' => $data['note'],
            ]);
            return redirect('/listreason');
        }
    }
    public function edit($id){
        $item=Reason::find($id);
        return view('admin.reason.edit',['item'=>$item]);
    }
    public function update(Request $request,$id){
        $requestData = $request->all();
        $reason=Reason::find($id);
        $reason->category=$requestData['category'];
        $reason->note=$requestData['note'];
        $reason->save();
        return redirect('/listreason');
    }
    public function delete($id){
        $reason=Reason::find($id);
        $reason->delete();
        return redirect('/listreason');
    }
    public function search(Request $request){
        $category = $request->search;
        // 'category',
        // 'note',
        $searchResult = Reason::where('category', 'like', '%'.$category.'%')->paginate(1);
        // dd($searchResult);
        return view('admin.search.late',['reason'=>$searchResult,'category'=>$category]);
    }
}
