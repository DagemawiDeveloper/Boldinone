@props(['createcatagories'])
 <!-- Main Content -->
<div id="content">
    <div class="m-2 p-2">
        <a href="{{ route ('admin.catagories.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-auto">
            <form method="POST" action="{{ route ('admin.catagories.store') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="catagories_name">CATAGORIES NAME</label>  
                    <div class="col-md-4">
                    <input id="product_name" name="catagory_name"  class="form-control input-md" required="" type="text">
                        
                    </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="catagories_description">CATAGORIES DESCRIPTION</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="product_description" name="catagory_description"></textarea>
                    </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_categorie">Sub category of</label>
                    <div class="col-md-4">
                        <select id="product_categorie" name="product_catagories" class="form-control">
                            <option value="" required >No sub-category</option> 
                            @foreach ($catagory as $catagories)
                                <option value="{{ $catagories['catagory_name' ] }}">{{ $catagories['catagory_name' ] }}</option>   
                                @endforeach
                        </select>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <div class="col-md-4">
                    <input id="approuved_by" name="service_list_by"  class="form-control input-md"
                     required value="{{ Auth::user()->name }}" type="text">
                    </div>
                    </div>

                    <!-- File Button --> 
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Main_image</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="catagory_image" class="input-file" type="file">
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" id="singlebutton" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
</div>