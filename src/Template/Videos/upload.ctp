    <?= $this->Flash->render() ?>

      <div class="panel panel-default">

        <div class="panel-heading"><h3>Upload Your LCS Big Play (50mb MAX)</h3> </div>
        <div class="panel-body">

          <!-- Standar Form -->
          
          <br />

          <!-- Drop Zone -->
          <h4>Drag and drop files below</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>

          <!-- Progress Bar -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
              <span class="sr-only">0% Complete</span>
            </div>
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <div class="file-list list-group">
              <!-- <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a> -->
            </div>
          </div>

          <h4>Manually Select Video File</h4>

          <form action="uploadFile" method="post" enctype="multipart/form-data" id="js-upload-form" name="myform">
            <div class="form-inline">
              <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />
                <input type="file" name="file" id="js-upload-files" >
              </div>
              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
            </div>
          </form>

        </div>
      </div>
