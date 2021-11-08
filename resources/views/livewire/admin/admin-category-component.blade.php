<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .sclist {
            list-style: none;
        }
        .sclist li{
            line-height:33px;
            border-bottom:1px solid #ccc ;
        }

    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-6">
                            <h3> All Category </h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">add new
                                Caregorie</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>

                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> category Name </th>
                                    <th>Slug</th>
                                    <th>Subcategory</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }} </td>
                                        <td>{{ $category->name }} </td>
                                        <td>{{ $category->slug }} </td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subcategories as $sCategory)
                                                    <li><i class="fa fa-caret-right"></i>{{ $sCategory->name }}
                                                        <a
                                                            href="{{ route('admin.editcategory', ['category_slug' => $category->slug, 'sCategory_slug' => $sCategory->slug]) }}">
                                                            <i class="fa fa-edit"></i>
                                                            <a href="#" wire:click.prevent="deleteSubcategory({{$sCategory->id}})"
                                                                onclick="confirm('Are you sure, You want to delete this Subcategory?')|| event.StopImmediatePropagation() "><i
                                                                    class="fa fa-times text-danger"></i></a>
                                                    </li>

                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"><i
                                                    class="fa fa-edit sa-2x"></i> Edit</a>
                                            <a href="#"
                                                onclick="confirm('Are you sure, You want to delete this category?')|| event.StopImmediatePropagation() "
                                                wire:click.prevent="deleteCategory({{ $category->id }})"
                                                style="margin-left:10px;"><i
                                                    class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
