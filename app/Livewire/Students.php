<?php

namespace App\Livewire;

use App\Events\StudentCreated;
use App\Jobs\SendEmailJob;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Students extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $editing = false;
    public $user_id = null;
    public $id = null;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $gender = 'male';
    public $dob;
    public $image;
    public function mount() {
        $this->user_id = auth()->user()->id;
    }

    public function delete(Student $student) {
        $student->delete();
        session()->flash('message', 'Student deleted successfully');
    }

    public function editStudent(Student $student) {
        $this->editing = true;
        $this->id = $student->id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->address = $student->address;
        $this->gender = $student->gender;
        $this->dob = $student->dob;
        $this->image = $student->image;
        $this->dispatch( 'close_modal','studentModal');
    }

    public function save() {
        if(!$this->editing) {
            if($this->image) {
                $path = $this->image->store('images','public');
                $student = Student::create([
                    'user_id' => $this->user_id, 
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'gender' => $this->gender,
                    'dob' => $this->dob,
                    'image' => $path,
                ]);
                // event(new StudentCreated($student));
                SendEmailJob::dispatch($student);
            }else {
                Student::create([
                    'user_id' => $this->user_id, 
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'gender' => $this->gender,
                    'dob' => $this->dob,
                ]);
            }
        }else {
            Student::find($this->id)->update([
                'user_id' => $this->user_id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'gender' => $this->gender,
                'dob' => $this->dob,
                // 'image' => $this->image,
            ]);
        }
        $this->dispatch( 'close_modal','studentModal');
    }

    public function render()
    {
        return view('livewire.students', [
            "students" => Student::paginate(7)
        ]);
    }
}
