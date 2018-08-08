<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Organization;
use App\Http\Resources\Organization as OrganizationResource;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get organizations
        $organizations = Organization::paginate($request->input('pageSize'));

        // Return collection of organizations as a resource
        return OrganizationResource::collection($organizations);
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
    public function store(Request $request)
    {
        $organization = $request->isMethod('put') ?
        Organization::findOrFail($request->organization_id) :
        new Organization;

        $organization->id = $request->organization_id;
        $organization->name = $request->name;

        if($organization->save()){
          return new OrganizationResource($organization);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return new OrganizationResource($organization);
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
      $organization = Organization::findOrFail($id);

      if($organization->delete()){
        return new OrganizationResource($organization);
      }
    }
}
