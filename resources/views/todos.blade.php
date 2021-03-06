@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <h3 class="mb-4">Let's Add To-Dos! 😊</h3>
        <!-- new todo Form -->
        <div class="row mx-auto mb-4">
            <form action="{{ url('todo') }}" method="POST" class="form-inline">
                {{ csrf_field() }}
                <!-- todo name -->
                <div class="form-group">
                    <label for="name" class="control-label mb-2 mr-sm-2 mb-sm-0">Name</label>
                    <input type="text" name="name" id="todo-name" class="form-control mb-2 mr-sm-2 mb-sm-0">
                </div>
                <!-- todo description -->
                <div class="form-group">
                    <label for="description" class="control-label mb-2 mr-sm-2 mb-sm-0">Description</label>
                    <input type="textarea" name="description" id="todo-description" class="form-control mb-2 mr-sm-2 mb-sm-0">
                </div>
                <!-- todo button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Current todos -->
    <!-- Current todos -->
    @if (count($todos) > 0)
        <div class="panel panel-default mb-4">
            <h3 class="mb-4">What's Left To Do 📝</h3>

            <div class="panel-body">
                <table class="table table-striped todo-table">

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($todos as $todo)
                        <tr>
                            <!-- todo Name -->
                            <td class="table-text">
                                <div>{{ $todo->name }}</div>
                            </td>

                            <td>
                                <!-- show description and single to-do ✅-->
                                <td>
                                    <form action="{{ url('todo/'.$todo->id) }}" method="GET">
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="fa fa-info-circle"></i> Description
                                        </button>
                                    </form>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('todo/'.$todo->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
