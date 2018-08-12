<?php

namespace App\Http\Controllers\MailingLists;

use App\Http\Requests\MailingLists\StoreMailingListRequest;
use App\MailingList;
use App\Transformers\MailingListTransformer;
use Cyvelnet\Laravel5Fractal\Facades\Fractal;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class MailingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = env('MAILCHIMP_API_USER');
        $password = env('MAILCHIMP_API_KEY');
        $appRoute = env('MAILCHIMP_API_ROUTE');

        $client = new Client(['base_uri' => $appRoute]);
        try {
            $response = $client->request('GET', 'lists', [
                'auth' => [$name, $password]
            ]);
        } catch (GuzzleException $error) {
            $responseCode = $error->getMessage();
            return response()->json($responseCode);
        }

        return json_decode((string) $response->getBody(), true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMailingListRequest $request)
    {
        $mailing_list = new MailingList();
        $mailing_list->name = $request->name;
        //subfields of contact
            $mailing_list->company = $request->company;
            $mailing_list->address1 = $request->address1;
            $mailing_list->address2 = $request->address2;
            $mailing_list->city = $request->city;
            $mailing_list->state = $request->state;
            $mailing_list->zip = $request->zip;
            $mailing_list->country = $request->country;
            $mailing_list->phone = $request->phone;
        $mailing_list->permission_reminder = $request->permission_reminder;
        $mailing_list->use_archive_bar = $request->use_archive_bar;
        //subfields of campaign_defaults
            $mailing_list->from_name = $request->from_name;
            $mailing_list->from_email = $request->from_email;
            $mailing_list->subject = $request->subject;
            $mailing_list->language = $request->language;
        $mailing_list->notify_on_subscribe = $request->notify_on_subscribe;
        $mailing_list->notify_on_unsubscribe = $request->notify_on_unsubscribe;
        $mailing_list->email_type_option = $request->email_type_option;
        $mailing_list->visibility = $request->visibility;
        $mailing_list->double_optin = $request->double_optin;
        $mailing_list->marketing_permissions = $request->marketing_permissions;
        $mailing_list->save();

        return Fractal::includes('author')->item($mailing_list, new MailingListTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
