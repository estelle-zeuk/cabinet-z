<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Repositories\AppointmentRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;


class AppointmentController extends Controller
{
    private $appointmentRepository;

    /**
     * AppointmentController constructor.
     * @param AppointmentRepository $appointmentRepository
     */
    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function store(Request $data)
    {
        $inputs = $data -> post();
        $inputs['date'] = date('Y-m-d H:i:s', strtotime($inputs['date']));
        try{
            //toggleDatabase();
           $feedback = DB::transaction(function () use ($inputs){
                    $this->appointmentRepository->store($inputs);

                    //Send mail
                       Mail::send('mail.rdv',compact('inputs'), function($message) use($inputs) {
                           $message->to(companyInfo()->email,$inputs['name'])->subject($inputs['subject']);
                       });
                      if(isset($inputs['source'])){
                          return back()->with(['status'=> 'success','message'=>'Demande de RDV envoyé avec succés']);
                      }
                    return response()->json(['success'=> true,'message'=>'Demande de RDV envoyé avec succés']);
                });
            return $feedback;
        }catch (Exception $e){
            if(isset($inputs['source'])){
                return back()->with(['status'=> 'success','message'=>'Erreur lors d\'envoi de la demande. Veuillez appeler les numéro de service client']);
            }
            return response()->json(['success'=>false]);
        }

    }
}
