<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title justify-content-start">
                            <h5>Media Library</h5>
                            <div class="selected-options">
                                <ul>
                                    <li id="selectedCount">selected(0)</li>
                                    <li><a class="dropdown-item d-flex align-items-center" href="#"
                                            id="downloadSelected" data-bs-original-title="" title=""><i
                                                class="ri-download-2-line me-2"></i>Download</a></li>
                                    <li><a href="#" id="deleteSelected" data-bs-original-title="" title=""><i
                                                class="ri-delete-bin-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="right-options ms-auto">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#mediaModel" data-bs-original-title="" title="">Add
                                            Media</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="row row-cols-xl-6 row-cols-md-5 row-cols-sm-3 row-cols-2 g-sm-3 g-2 media-library-sec ratio_square">

                            <?php
                            $directory = "../public/images/";
                            $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

                            foreach ($images as $index => $image) {
                                $filename = basename($image); // Lấy tên tệp tin
                                $imageUrl = htmlspecialchars($image); // Escape URL của ảnh để tránh các ký tự đặc biệt

                                // Render HTML cho mỗi ảnh
                            ?>
                            <div>
                                <div class="library-box">
                                    <input type="checkbox" name="images[]" id="myCheckbox<?php echo $index ?>"
                                        class="imageCheckbox" data-bs-original-title="" title="">
                                    <label for="myCheckbox<?php echo $index ?>">
                                        <div class="b_size_content bg-size"
                                            style="background-image: url(&quot;<?php echo $imageUrl ?>&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                                            <img src="<?php echo $imageUrl ?>" class="img-fluid bg-img bg_size_content"
                                                alt="" style="display: none;">
                                        </div>
                                        <div class="dropdown">
                                            <a class="" href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                data-bs-original-title="" title="">
                                                <i class="ri-more-fill"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item d-flex align-items-center"
                                                        href="<?php echo $imageUrl ?>" download=""
                                                        data-bs-original-title="" title=""><i
                                                            class="ri-download-2-line me-2"></i>Download</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center deleteImage"
                                                        href="../public/admin/media/1/delete" data-bs-original-title=""
                                                        title=""><i class="ri-delete-bin-line me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                        <script>
                        // Lấy danh sách tất cả các phần tử checkbox trong danh sách hình ảnh
                        var checkboxes = document.getElementsByClassName('imageCheckbox');

                        // Lặp qua danh sách các checkbox và thêm sự kiện lắng nghe cho mỗi checkbox
                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].addEventListener('change', updateSelectedCount);
                        }

                        // Hàm xử lý sự kiện thay đổi checkbox
                        function updateSelectedCount() {
                            // Đếm số lượng checkbox đã được chọn
                            var selectedCount = 0;
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i].checked) {
                                    selectedCount++;
                                }
                            }

                            // Cập nhật nội dung của phần tử "selectedCount"
                            var selectedCountElement = document.getElementById('selectedCount');
                            selectedCountElement.textContent = 'selected(' + selectedCount + ')';
                        }
                        document.getElementById('downloadSelected').addEventListener('click', function() {
                            var checkboxes = document.getElementsByClassName('imageCheckbox');
                            var selectedImages = [];

                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i].checked) {
                                    selectedImages.push(checkboxes[i]);
                                }
                            }

                            if (selectedImages.length > 0) {
                                for (var j = 0; j < selectedImages.length; j++) {
                                    var imageURL = selectedImages[j].parentNode.querySelector('img').src;
                                    var downloadLink = document.createElement('a');
                                    downloadLink.href = imageURL;
                                    downloadLink.download = 'image_' + j + '.jpg';
                                    downloadLink.click();
                                }
                            } else {
                                console.log('No images selected.');
                            }
                        });
                        // Lắng nghe sự kiện khi người dùng nhấp vào biểu tượng xóa
                        document.getElementById('deleteSelected').addEventListener('click', function() {
                            var selectedImages = [];
                            var imageCheckboxes = document.getElementsByClassName('imageCheckbox');

                            // Lặp qua tất cả các checkbox hình ảnh
                            for (var i = 0; i < imageCheckboxes.length; i++) {
                                if (imageCheckboxes[i].checked) {
                                    var imageId = imageCheckboxes[i].id.replace('myCheckbox', '');
                                    selectedImages.push(imageId);
                                }
                            }

                            // Gửi yêu cầu POST để xóa các media đã chọn
                            fetch('../public/admin/medias', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': 'IjlXCCKF9soniAQd9wZ3xXCpwSfgtKbM0Q4i33vy', // Thêm CSRF token của Laravel
                                    },
                                    body: JSON.stringify({
                                        ids: selectedImages
                                    }),
                                })
                                .then(response => {
                                    if (response.ok) {
                                        // Xử lý thành công
                                        console.log('Xóa thành công!');
                                        location.reload(); // Load lại trang
                                    } else {
                                        // Xử lý lỗi
                                        console.error('Đã xảy ra lỗi khi xóa!');
                                    }
                                })
                                .catch(error => {
                                    console.error('Lỗi kết nối: ', error);
                                });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>