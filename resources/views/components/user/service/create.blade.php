@props(['create'])
 <!-- Main Content -->
    <div id="content">
    <div class="m-2 p-2">
        <a href="{{ route ('user.service.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-auto">
            <form method="POST" action="{{ route ('user.service.store') }}" class="form-horizontal">
                @csrf
                @method('PUT')
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
                    <div class="col-md-4">
                    <input id="product_name" name="service_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
                        
                    </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
                    <div class="col-md-4">
                        <select id="product_categorie" name="service_catagories" class="form-control">
                            <option value="" required >Select catagory</option>  
                            @foreach ($catagories as $catagory)
                                <option value="{{ $catagory['catagory_name' ] }}">{{ $catagory['catagory_name' ] }}</option>   
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="product_description" name="service_description"></textarea>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <div class="col-md-4">
                    <input id="approuved_by" name="service_list_by"  class="form-control input-md"
                     required value="{{ Auth::user()->name }}" type="text" hidden>
                    </div>
                    </div>

                    <!-- File Button --> 
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Main_image</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="main_image" class="input-file" type="file">
                    </div>
                    </div>
                    <!-- File Button --> 
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Banner_image</label>
                    <div class="col-md-4">
                        <input id="filebutton" name="banner_image" class="input-file" type="file">
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