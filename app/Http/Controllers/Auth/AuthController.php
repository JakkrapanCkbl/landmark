<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\JobOrderEdit;
use Livewire\Livewire;

  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            //dd('ok');
            return view('dashboard');
            //$jobs = DB::select('select * from jobs order by id desc LIMIT 20');
            // $users = array(
            //     'userName'=>Auth::user(),
            //     'userId'=>Auth::id()
            //     );
            //$users = Auth::user();
            //return view('livewire.index',compact('jobs', 'users'));
            
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function create(array $data)
    {
      $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);

      if (request()->hasFile('avatar')) {
        $avatar = request()->file('avatar')->getClientOriginalName();
        request()->file('avatar')->storeAs('avatars', $avatar, 'public');
        $user->update(['avatar' => $avatar]);
      }

      return $user;
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function JobOrderAdd()
    {
        if(Auth::check()){
            //$users = Auth::user();
            //return view('livewire.index',compact('jobs', 'users'));
            return view('joborder.joborder-add');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function JobOrderEdit($id)
    {
        
        if(Auth::check()){
            return view('joborder.joborder-edit')->with('id',$id);
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function ExportData()
    {
        if(Auth::check()){
            return view('joborder.ExportData');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }



}