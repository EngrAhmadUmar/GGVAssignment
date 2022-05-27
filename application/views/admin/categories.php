<?php
  include_once "headeradmin.php";
?>

<?php
  include_once "sidebar.php";
?>

</div><!-- az-content-left -->
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="az-content-breadcrumb">
        <span>Categories</span>
        <span>View Categories</span>
    </div>
    <hr class="mg-y-30">

    <div class="az-content-label mg-b-5">Category details</div>
    <p class="mg-b-20">Hover over rows to highlight</p>

    <a href="#" data-toggle="modal" data-target="#createModal"><button type="button" class="btn btn-dark">Add Category</button></a>
    <br>
    <div class="table-responsive">
        <table class="table table-hover mg-b-0">
            <thead>
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Manage Category</th>
                    <th>Delete Category</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $categories = $this->db->get_where('categories')->result_array();
                foreach($categories as $category):
                ?>
                <tr>
                    <td><?php echo $category['id'];?></td>
                    <td><?php echo $category['categoryname'];?></td>
                    <td>  <a href="" data-id="<?php echo $category['id'];?>" class="edit" data-toggle="modal" data-target="#editModal"><img
                                src="https://img.icons8.com/android/24/000000/edit.png" /></a></td>
                    <td><a href="<?php echo base_url().'admin/deleteCategory/'.$category['id'];?>"><img
                                src="https://img.icons8.com/flat-round/24/000000/delete-sign.png" /></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
</div>
</body>
<?php
  include_once "footer.php";
?>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Create Category</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="<?php echo base_url();?>admin/addCategory">
                                <div class="form-group">
                                    <input required type="text" name="name" class="form-control"
                                        placeholder="Enter Category Name...">
                                </div>
            
                                <button type="submit"
                                    class="btn btn-info btn-block btn-round">Add Category</button>
                            </form>


                        </div>
                    </div>

                   
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="<?php echo base_url().'admin/editCategory/';?>">
                                <div class="form-group">

                                <input type="hidden" name="id" id="bookId" value=""/>
                                
                                    <input required type="text" name="name" class="form-control"
                                        placeholder="Enter New Category Name...">
                                </div>
            
                                <button type="submit"
                                    class="btn btn-info btn-block btn-round">Update Category</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>



<script>
        $(document).on("click", ".edit", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     document.cookie = "category=" + myBookId;
    //  window.alert(myBookId);
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});

</script>