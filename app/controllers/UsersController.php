<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		$departments = Department::all();
		$roles 		 = Role::all();

		$departmentsList = [];
		$rolesList       = [];

		foreach ($departments as $department) {
			$departmentsList[$department->id] = ucfirst($department->name);
		}

		foreach ($roles as $role) {
			$rolesList[$role->id] = ucfirst($role->name);
		}

		return View::make('admin.users.create')
			->with('departments', $departmentsList)
			->with('roles', $rolesList);
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['lockpds'] = 'locked';

		User::create($data);

		return Redirect::route('admin.users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('admin.users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		$departments = Department::all();
		$roles 		 = Role::all();

		$departmentsList = [];
		$rolesList       = [];

		foreach ($departments as $department) {
			$departmentsList[$department->id] = ucfirst($department->name);
		}

		foreach ($roles as $role) {
			$rolesList[$role->id] = ucfirst($role->name);
		}

		return View::make('admin.users.edit', compact('user'))
			->with('roles', $rolesList)
			->with('departments', $departmentsList);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('admin.users.index');
	}

    /**
     * Lock a user pds
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lock($id)
    {
        $user = User::findOrFail($id);

        $user->lockpds = 'locked';
        $user->save();

        return Redirect::route('admin.users.index');
    }

    /**
     * Unlock a user pds
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unLock($id)
    {
        $user = User::findOrFail($id);

        $user->lockpds = 'unlocked';
        $user->save();

        return Redirect::route('admin.users.index');
    }

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ($id == 1) {
			return Response::json(['message' => 'error'], 400);
		}

		User::destroy($id);

		return Response::json(['message' => 'deleted successfully'], 200);
	}

}
