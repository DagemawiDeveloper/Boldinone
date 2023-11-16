@props(['createcatagories'])
 <!-- Main Content -->
<div id="content">
    <div class="m-2 p-2">
        <a href="{{ route ('user.catagories.index') }}" class="px-4 py-2 btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="col-auto">
            <form method="POST" action="{{ route ('user.catagories.store') }}" class="form-horizontal" enctype="multipart/form-data">
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