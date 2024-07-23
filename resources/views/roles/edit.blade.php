@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Role
                    </div>
                    <div class="float-end">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $role->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="permissions"
                                class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                            @php
                                $groupedPermissions = [
                                    'Role Permissions' => ['create-role', 'edit-role', 'delete-role'],
                                    'User Permissions' => ['create-user', 'edit-user', 'delete-user'],
                                    'Product Permissions' => [
                                        'view-product',
                                        'create-product',
                                        'edit-product',
                                        'delete-product',
                                    ],
                                    'Customer Permissions' => [
                                        'view-customer',
                                        'create-customer',
                                        'edit-customer',
                                        'delete-customer',
                                    ],
                                    'Supplier Permissions' => [
                                        'view-supplier',
                                        'create-supplier',
                                        'edit-supplier',
                                        'delete-supplier',
                                    ],
                                ];
                            @endphp

                            <div class="col-md-6">
                                @foreach ($groupedPermissions as $group => $permissionsList)
                                    <h6 class="mt-4 mb-0 "><b>{{ $group }}</b></h6>
                                    @foreach ($permissionsList as $permissionName)
                                        @php
                                            $permission = $permissions->firstWhere('name', $permissionName);
                                        @endphp
                                        @if ($permission)
                                            <div class="form-check">
                                                <input class="form-check-input @error('permissions') is-invalid @enderror"
                                                    type="checkbox" id="permission_{{ $permission->id }}"
                                                    name="permissions[]" value="{{ $permission->id }}"
                                                    {{ in_array($permission->id, $rolePermissions ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Role">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
