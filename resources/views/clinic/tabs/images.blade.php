<div class="form-row justify-content-center my-5">
    <div class="form-group col-12">
        <div class="custom-file-container" data-upload-id="myUniqueLogoUploadId">
            <label>Upload Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>

            <label class="custom-file-container__custom-file" >
                <input name="logo" type="file" class="custom-file-container__custom-file__custom-file-input" accept="*">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
    <div class="form-group col">
        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
            <label>Upload File <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>

            <label class="custom-file-container__custom-file" >
                <input name="pics[]" type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
</div>
