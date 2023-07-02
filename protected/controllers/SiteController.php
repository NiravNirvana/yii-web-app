<?php

class SiteController extends Controller
{
	
	public $URL_request;
	
	// CONNECTION VARIABLE TO MONGO
	public $manager;
	
	public function init()
	{
		// CONNECTION STRING TO MONGO
		$this->manager=new MongoDB\Driver\Manager("connection string of mongodb database");
		
			//echo md5('123');exit(0);
			// Page Ristriction Code 
			$this->URL_request=Yii::app()->urlManager->parseUrl(Yii::app()->request);
			//echo Yii::app()->request;exit(0);
			if($this->URL_request=='')
			{
				
				$this->redirect('index.php/sh');
			}
			
		//////////////DYNAMIC TABLE STATUS	
		if(isset($_GET['dynamictable'])&&Yii::app()->session['dynamictable']!=$_GET['dynamictable'])
		{
			Yii::app()->session['dynamictable']=$_GET['dynamictable'];
				
			// RESET FILTERS	
			if(isset(Yii::app()->session['vlist_his']))
				Yii::app()->session['vlist_his']=array();						
			if(isset(Yii::app()->session['adtype_list_his']))
				Yii::app()->session['adtype_list_his']=array();						
			if(isset(Yii::app()->session['adtitle_list_his']))
				Yii::app()->session['adtitle_list_his']=array();						
			if(isset(Yii::app()->session['admode_list_his']))
				Yii::app()->session['admode_list_his']=array();	
			
			if(isset(Yii::app()->session['table']))
				Yii::app()->session['table']=1;
		

		}	
			
	}
	
	
	
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(!isset(Yii::app()->session['id']))
		if($this->URL_request=='')
			$this->redirect('index.php/sl');
		else	
			$this->redirect('sl');
		
	
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='sh')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'sh');// last location
		
		
		
		
		// CONNECTION TO MONGO
						// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
						// CONDITIONS 
						$filter = [];
						$options = [];
		                
						// CONDITIONS 
						
						$command = new MongoDB\Driver\Command(
										[
										  "count" => "installtrack",// table name
										  //"query" => ['LastOnline' => ['$gt' => (int) $Time]]
										]);

						$cursor = $this->manager->executeCommand('dynamic_admin', $command);
						$result=json_decode(json_encode($cursor->toArray()),true);
						//$query = new MongoDB\Driver\Query($filter, $options);
						//$cursor = $this->manager->executeQuery('dynamic_admin.installtrack', $query);
						//$result=array();	
						//foreach($cursor as $result)
						//	$result=json_decode(json_encode($result),true);
							
						//print_r($result);exit(0);		
			
		
		$this->render('index',array('result'=>$result));
	}

	
	
	public function actionChangepass()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/chp');
			else	
				$this->redirect('sl');
		
		// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
	
		
		$err="";
		
		if(isset($_POST['chng']))
		{
			//print_r($_POST);
			//exit(0);
			$npwd=md5(Yii::app()->session['unm'].$_POST['new']);
			$old=md5(Yii::app()->session['unm'].$_POST['old']);
			
							try 
							{
								
								
								$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
								$bulk->update(
												['password' => $old],
												['$set' => [
															'password' => $npwd
															 ]],
												['multi' => false]
											 );
								$enb = $this->manager->executeBulkWrite('dynamic_admin.user', $bulk);
								if($enb->getModifiedCount()>0)
									Yii::app()->session['err']="ch";
								else
									Yii::app()->session['err']="nch";
								
								
									
								//print_r($ACCusers);
								//exit(0);
							} 
							catch (Exception $e)
							{
								echo $e;
								exit(0);
							} 
			
		}
		
		
		
		$this->render('changepass');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	
	
			if(isset(Yii::app()->session['id']))
							$this->redirect('sh');
		
		
		$this->layout='...';
		$err="";
		
			
			if(isset($_POST['log']))
			{
				//print_r($_POST);
				//exit(0);
		
					$unm=trim($_POST['eml']);
					$pwd=md5(trim($_POST['eml'].$_POST['psw']));
		
					// CONNECTION TO MONGO
						// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
						
					try 
					{
						
						// CONDITIONS 
						$filter = [
									'username' => $unm,
									'password' => $pwd
								  ];
						$options = [];
		                
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursor = $this->manager->executeQuery('dynamic_admin.user', $query);
						foreach($cursor as $result)
							$result=json_decode(json_encode($result),true);
							
							if(isset($result['password']) && isset($result['username']) && $result['password']==$pwd && $result['username']==$unm)
							{
								Yii::app()->session['id'] = $result['username'];
								Yii::app()->session['unm'] = $result['username'];
								
									//print_r($_COOKIE);exit(0);
										if(!isset($_COOKIE['LAST_TOUR']))
										{
											 setcookie("LAST_TOUR", "sh", time()+28800, "/", "",  0);
											 //echo "new COOKIE";print_r($_COOKIE);exit(0);
											 $this->redirect('sh');	
										}
										else
										{
											//print_r($_COOKIE);exit(0);
											$this->redirect($_COOKIE['LAST_TOUR']);	
										}
							}
							else 
							{
								$err="Invalid username & password";
							}
							
						//print_r($result);exit(0);	
						//print_r($cursor->toArray());exit(0);	
					
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
					} 
			}
		
		// display the login form
		$this->render('login',array('err'=>$err));
	}

	
	public function actionAjaxmoveNewAdmin()
	{
		$result['res']=explode('|',$_POST['mid'])[0];
			
			// CONNECTION TO MONGO
			//$manager = new MongoDB\Driver\Manager("");
			
		if($_POST['op']=='up')
		{
			try 
			{
				// CONDITIONS 
				$filter = [];
				$options = [
							"projection" => ["_id" => 1,"position" =>1],
							'sort' => ['position' => 1],
							];
				$query = new MongoDB\Driver\Query($filter, $options);
				$cursor = $this->manager->executeQuery('dynamic_admin.application', $query);
				$rw=$cursor->toArray();
				
				$mmiidd=0;
				$mmiidd_pos=0;
				$i=0;
				do{
					$mmiidd=json_decode(json_encode($rw[$i]),true)['_id'] ['$oid'];
					$mmiidd_pos=json_decode(json_encode($rw[$i]),true)['position'];
					$i++;	
				}while(json_decode(json_encode($rw[$i]),true)['_id'] ['$oid']!=explode('|',$_POST['mid'])[0]);
				
				$result['replacewith']=$mmiidd;
				$result['replacewith_pos']=$mmiidd_pos;
						
				//$result['last']=explode('|',$_POST['mid'])[0];
				$result['moved']=explode('|',$_POST['mid'])[0];
				$result['moved_pos']=explode('|',$_POST['mid'])[1];
				//print_r($ACCusers);exit(0);
			} 
			catch (Exception $e)
			{
				echo $e;
				//echo json_encode($result+$e);exit(0);	
				exit(0);
			} 
		
				
			try 
			{
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
								['_id' => new \MongoDB\BSON\ObjectID(explode('|',$_POST['mid'])[0])],
								['$set' => ['position' => (int)$mmiidd_pos]],
								['multi' => false]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
								['_id' => new \MongoDB\BSON\ObjectID($mmiidd)],
								['$set' => ['position' => (int)(explode('|',$_POST['mid'])[1])]],
								['multi' => false]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
			} 
						
		}
		else
		{
			try 
			{
			
				// CONDITIONS 
				$filter = [];
				$options = [
							"projection" => ["_id" => 1,"position" =>1],
							'sort' => ['position' => 1],
							];
				$query = new MongoDB\Driver\Query($filter, $options);
				$cursor = $this->manager->executeQuery('dynamic_admin.application', $query);
				$rw=$cursor->toArray();
				
				$mmiidd=0;
				$i=0;
				while(json_decode(json_encode($rw[$i]),true)['_id'] ['$oid']!=explode('|',$_POST['mid'])[0])$i++;
					$mmiidd=json_decode(json_encode($rw[$i+1]),true)['_id'] ['$oid'];
					$mmiidd_pos=json_decode(json_encode($rw[$i+1]),true)['position'];
				
				$result['replacewith']=$mmiidd;
				$result['replacewith_pos']=$mmiidd_pos;
						
				//$result['last']=explode('|',$_POST['mid'])[0];
				$result['moved']=explode('|',$_POST['mid'])[0];
				$result['moved_pos']=explode('|',$_POST['mid'])[1];
				
				//print_r($ACCusers);exit(0);
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
			} 
		
			
			try 
			{
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
								['_id' => new \MongoDB\BSON\ObjectID(explode('|',$_POST['mid'])[0])],
								['$set' => ['position' => (int)$mmiidd_pos]],
								['multi' => false]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				
				
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
								['_id' => new \MongoDB\BSON\ObjectID($mmiidd)],
								['$set' => ['position' => (int)(explode('|',$_POST['mid'])[1])]],
								['multi' => false]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
			
				
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
			} 
		}
		
		echo json_encode($result);
	}


	
	
	public function actionAdvertiseCostom()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/sw');
			else	
				$this->redirect('sl');
		
				
			
			$err="";
			//print_r($_GET);
			//exit(0);
			
			// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
		if(isset($_GET['generalSearch']))
		{
			
			Yii::app()->session['generalSearch']=$_GET['generalSearch'];
			echo Yii::app()->session['generalSearch'];
			exit(0);	
			
		}
		
		if(isset($_GET['deleteAll']))
		{
					 
			//print_r(count($_GET));exit(0);
			// return if no id pass
			if(count($_GET)==1)
				return;
			
			$filter =array();
			$i=0;
			foreach($_GET as $key=>$val)
			{	
				//echo $i;
				if($i!=0)
				{
					//echo $key."  /  ".new \MongoDB\BSON\ObjectID($key)."<br>";
					$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($key);
				}	
				$i++;
			}
			
			//echo $i;exit(0);
			//print_r($filter);
			//exit(0);
					try 
					{
						// CONDITIONS 
						$options = [
									'projection' =>  [
														'icon' => 1,
														'banner' => 1,
													 ],
									'sort' => ['date' => -1],
								   ];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursorDT = $this->manager->executeQuery('dynamic_admin.advertisement_custom', $query);
						$cursorDTARR=$cursorDT->toArray();
						//print_r($cursorDTARR);exit(0);
						
						$bulk = new MongoDB\Driver\BulkWrite;
						foreach($cursorDTARR as $v){  
							$v=json_decode(json_encode($v),true);
							
							 $filename = "images/AD/".$v['icon'];
							  if (file_exists($filename)) {
								unlink($filename);
								//echo 'File '.$filename.' has been deleted';
							  }
							  //exit(0);
								$filename = "images/AD/".$v['banner'];
							  if (file_exists($filename)) {
								unlink($filename);
								//echo 'File '.$filename.' has been deleted';
							  }
							  //exit(0);
							
							$bulk->delete(
										['_id' => new \MongoDB\BSON\ObjectID($v['_id'] ['$oid'])],
										['limit' => 0]
										);
						}
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
			
		}
		
		
		if(isset($_POST['addTD']))
		{
			//print_r($_POST);
			//print_r($_FILES);exit(0);
			//echo count($_FILES["wimg"]["error"]);
			$clr="";
			
			
						 $file_ext=pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
						 $fnmB="BANNER".date('Ymdhis').rand(1000, 9999).".".$file_ext;
						 move_uploaded_file($_FILES["banner"]["tmp_name"],"images/AD/" . $fnmB);
						
						 $file_ext=pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
						 $fnmI="ICON".date('Ymdhis').rand(1000, 9999).".".$file_ext;
						 move_uploaded_file($_FILES["icon"]["tmp_name"],"images/AD/" . $fnmI);
					
						//exit(0);
							
						$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
						try
						{
								$bulk = new MongoDB\Driver\BulkWrite;
								$newAdId = $bulk->insert([
												'add_title' => $_REQUEST['tdnm'],
												'add_desc' => $_REQUEST['desc'],
												'advertisement_custom_multi' => json_encode(array()),
												'icon' => $fnmI,
												'banner' => $fnmB,
												'install' => $_REQUEST['link'],
												'color' => $_REQUEST['clr'],
												'rating' => $_REQUEST['rating'],
												'download' => $_REQUEST['download'],
												'review' => $_REQUEST['review'],
												//'design_page' => $_REQUEST['design'],
												'enable' => 0,
												'date' => date('Y-m-d h:i:s')
											 ]);
								$newCollection = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk, $writeConcern);
							
								//var_dump($newAdId);exit(0);
							
									$filter = [];
									$options = [];
												
									$query = new MongoDB\Driver\Query($filter, $options);
									$cursor = $this->manager->executeQuery('dynamic_admin.app_master', $query);
									$cursor=$cursor->toArray();
									$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
									$val=0;
									foreach($cursor as $am)
									{
										$am=json_decode(json_encode($am),true);

										$bulk->insert([
												'apid' => $am['_id'] ['$oid'],
												'cad_id' => $newAdId,
												]);
									$val++;			
									}
									if($val!=0)
									$amENT = $this->manager->executeBulkWrite('dynamic_admin.app_cad_status', $bulk, $writeConcern);
							
							
								//var_dump($newCollection->getInsertedCount());exit(0);
								if($newCollection->getInsertedCount()>0)
									Yii::app()->session['err']="i2";
								else
									Yii::app()->session['err']="i3";
								
								$this->redirect('ac');
						} 
						catch (Exception $e)
						{
							echo $e;
							exit(0);
							Yii::app()->session['err']="i3";
						
						}	
		}
		
			
		if(isset($_POST['eid']))
		{
			//print_r($_POST);
			//print_r($_FILES);
			//exit(0);
			
			
			
			if($_FILES["banner"]["error"]==0)
			{
				//print_r($_POST);
				//print_r($_FILES);
				
				//echo "data with file";
				
				//exit(0);
				
				 $filename = "images/AD/".$_REQUEST['oldbanner'];
						  if (file_exists($filename)) {
							unlink($filename);
							//echo 'File '.$filename.' has been deleted';
						  }
						  //exit(0);
				
				
				
				 $file_ext=pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
				 $fnm="BANNER".date('Ymdhis').".".$file_ext;
				 move_uploaded_file($_FILES["banner"]["tmp_name"],"images/AD/" . $fnm);
      		
				
				
					try 
					{
						
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_POST['eid'])],
											['$set' => [
														'banner' => $fnm
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
							
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					}
			}
			
			
			if($_FILES["icon"]["error"]==0)
			{
				//print_r($_POST);
				//print_r($_FILES);
				
				//echo "data with file";
				
				//exit(0);
				
				 $filename = "images/AD/".$_REQUEST['oldicon'];
						  if (file_exists($filename)) {
							unlink($filename);
							//echo 'File '.$filename.' has been deleted';
						  }
						  //exit(0);
				
				
				
				 $file_ext=pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
				 $fnm="ICON".date('Ymdhis').".".$file_ext;
				 move_uploaded_file($_FILES["icon"]["tmp_name"],"images/AD/" . $fnm);
      		
				
					try 
					{
						
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_POST['eid'])],
											['$set' => [
														'icon' => $fnm
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
							
					} 
					catch (Exception $e)
					{
						$transaction->rollBack();
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
					}
			}
			
			
				//print_r($_POST);
				//print_r($_FILES);
				//exit(0);
				
					try 
					{
						
						
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_POST['eid'])],
											['$set' => [
														'add_title' => $_POST['tdnm'],
														'add_desc' => $_POST['desc'],
														'install' => $_POST['link'],
														'color' => $_POST['clr'],
														'rating' => $_POST['rating'],
														'download' => $_POST['download'],
														'review' => $_POST['review'],
													//	'design_page' => $_POST['design']
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
							if($enb->getModifiedCount()>0)
								Yii::app()->session['err']="e2";
							else
								Yii::app()->session['err']="e3";
						
						//$this->redirect('ac');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					}
				
				
		exit(0);		
				
		}
		
		if(isset($_GET['did']))
		{
			//print_r($_GET);
			//exit(0);
			
					 $filename = "images/AD/".$_GET['b'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
						$filename = "images/AD/".$_GET['i'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
					
					try 
					{
						
						$bulk = new MongoDB\Driver\BulkWrite;
						$bulk->delete(
									  ['_id' => new \MongoDB\BSON\ObjectID($_GET['did'])],
									  ['limit' => 0]
									 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						Yii::app()->session['err']="d2";
						
						
						//$this->redirect('ac');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					} 

		}
		
		
		if(isset($_GET['lid']))
		{
			//print_r($_GET);
			//exit(0);
				
					try 
					{
				
						if($_GET['now']==0)
						{
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_GET['lid'])],
											['$set' => [
														'enable' => 1
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
										
							
						}else{
							
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_GET['lid'])],
											['$set' => [
														'enable' => 0
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						}

				
						//$this->redirect('ac');
						
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
					} 

		}
		
			
		//print_r($_SESSION);exit(0);
		
			
	
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='ac')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'ac');// last location
		setcookie("LEVEL", '0');
		
					try 
					{  
						// STATUS FILTER
						$filter =array();
						// CONDITIONS 
						if(isset(Yii::app()->session['generalSearch'])&&Yii::app()->session['generalSearch']!='')
						{
							$filter['add_title']['$regex']=Yii::app()->session['generalSearch'];
							$filter['add_title']['$options']='-i';
							
							//$filter['add_title']['$regex']=Yii::app()->session['generalSearch'];
						}
						
						
						if(isset($_GET['search']))
							Yii::app()->session['search_cad']=$_GET['type'];
						else if(!isset(Yii::app()->session['search_cad']))
							Yii::app()->session['search_cad']=2;
						
						if(Yii::app()->session['search_cad']==1)
							$filter['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$filter['enable'] = 0;
						
						
						
						//print_r($_SESSION);
						//print_r($filter);exit(0);
						
					////////////////////////SORTING ///////////////////////////
						if(isset($_GET['sort']))
						{
							$sort['sort_cad_on']=$_GET['on'];
							if(isset(Yii::app()->session['sort']['sort_cad_on'])&&Yii::app()->session['sort']['sort_cad_on']!=$sort['sort_cad_on'])
								$sort['sort_cad_op']=-1;
							else	
								$sort['sort_cad_op']=$_GET['op'];
							Yii::app()->session['sort']=$sort;
						}	
						else if(!isset(Yii::app()->session['sort']))
						{
							$sort['sort_cad_on']='date';
							$sort['sort_cad_op']=-1;
							Yii::app()->session['sort']=$sort;
						}	
						//print_r(Yii::app()->session['sort']);exit(0);
				
					/////////////////////PAGINATION DROPDOWN/////////////////
							if(isset($_GET['search'])&&Yii::app()->session['search_cad']!=$_GET['search'])
							{
								setcookie("ac_pagination_dropdown", 10);// RESET SCROLL POSITION
								setcookie("ac_pagination_page", '1');// RESET SCROLL POSITION
								setcookie("ac_pagination_skip", '0');// RESET SCROLL POSITION
											
							}
							if(isset($_GET['pagination_dropdown']))
							{
									setcookie("ac_pagination_dropdown", $_GET['pagination_dropdown']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(isset($_GET['skip']))
							{
								//print_r($_GET);
									setcookie("ac_pagination_skip", $_GET['skip']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(!isset($_COOKIE['ac_pagination_skip']))
							{
									setcookie("ac_pagination_skip", 0);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
					
							//print_r($_COOKIE);exit(0);
						
						$options = [
									'projection' =>  [
														'advertisement_custom_multi' => 0
													 ],
									'sort' => [Yii::app()->session['sort']['sort_cad_on'] => (int)Yii::app()->session['sort']['sort_cad_op']],
								   
									'limit' => $_COOKIE['ac_pagination_dropdown'],
									'skip' => $_COOKIE['ac_pagination_skip']
								   
								   ];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursorDT = $this->manager->executeQuery('dynamic_admin.advertisement_custom', $query);
						$cursorDTARR=$cursorDT->toArray();
						
						//$i=0;
						//foreach($cursorDTARR as $v){  
						//	$v=json_decode(json_encode($v),true);
						//	$rw[$i]['no']		=$i+1;
						//	$rw[$i]['_id']		=$v['_id'] ['$oid'];
						//	$rw[$i]['add_title']=$v['add_title'];
						//	$rw[$i]['add_desc']	=$v['add_desc'];
						//	$rw[$i]['icon']		=$v['icon'];
						//	$rw[$i]['banner']	=$v['banner'];
						//	$rw[$i]['install']	=$v['install'];
						//	$rw[$i]['color']	=$v['color'];
						//	$rw[$i]['rating']	=$v['rating'];
						//	$rw[$i]['download']	=$v['download'];
						//	$rw[$i]['review']	=$v['review'];
						//	$rw[$i]['enable']	=$v['enable'];
						//	$rw[$i]['date']		=date('d/m/Y',strtotime($v['date']));
						//	$i++;
						//}
						//$cursorDT=json_encode(json_decode(json_encode($cursorDTARR),true));
						//print_r(json_encode($rw));exit(0);
						
						
						if(Yii::app()->session['search_cad']==1)
							$filter1['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$filter1['enable'] = 0;
						else
						{
							$filter1['$or' ][]['enable'] = 0;
							$filter1['$or' ][]['enable'] = 1;
						}
						// CONDITIONS 
						$command = new MongoDB\Driver\Command(
										[
										  "count" => "advertisement_custom",// table name
										  "query" => $filter1
										]);
						$cursor = $this->manager->executeCommand('dynamic_admin', $command);
						$result=json_decode(json_encode($cursor->toArray()),true);
						
						//print_r($result);exit(0);
						
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}


		
		
		$this->render('customAD',array('rw'=>$cursorDTARR,'err'=>$err,'cnt'=>$result[0]['n']));
		//$this->render('customAD',array('rw'=>json_encode($rw),'err'=>$err,'cnt'=>count($cursorDTARR)));
	}
	
public function manual_sort($array, $akey,$type)
{ 
	 $cmp_DES = function ($a, $b) use ($akey) {
		 return  strcmp($b[$akey], $a[$akey]);
     };
	 
	 $cmp_ASS = function ($a, $b) use ($akey) {
		return strcmp($a[$akey], $b[$akey]);
     };
	

  
	  if($type==1)
		  usort($array, $cmp_ASS);
	  else
		  usort($array, $cmp_DES);
	  
	  return $array;
}

	public function actionAdvertiseCostom_multi()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/acm');
			else	
				$this->redirect('sl');
		
		
			$err="";
			if(isset($_REQUEST['FR'])&&isset($_REQUEST['title']))
			{
					Yii::app()->session['FR']=$_REQUEST['FR'];
					Yii::app()->session['title']=$_REQUEST['title'];
			}
			
			
			// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
		
					////////////////////////SORTING ///////////////////////////
						if(isset($_GET['sort']))
						{
							$sort['sort_cad_on']=$_GET['on'];
							if(isset(Yii::app()->session['sort']['sort_cad_on'])&&Yii::app()->session['sort']['sort_cad_on']!=$sort['sort_cad_on'])
								$sort['sort_cad_op']=-1;
							else	
								$sort['sort_cad_op']=$_GET['op'];
							Yii::app()->session['sort']=$sort;
						}	
						else if(!isset(Yii::app()->session['sort']))
						{
							$sort['sort_cad_on']='date';
							$sort['sort_cad_op']=-1;
							Yii::app()->session['sort']=$sort;
						}	
						//print_r(Yii::app()->session['sort']);exit(0);
				
					/////////////////////PAGINATION DROPDOWN/////////////////
							
							if(isset($_GET['pagination_dropdown']))
							{
									setcookie("ac_pagination_dropdown", $_GET['pagination_dropdown']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							
							if(isset($_GET['skip']))
							{
								//print_r($_GET);
									setcookie("ac_pagination_skip", $_GET['skip']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							
							if(!isset($_COOKIE['ac_pagination_skip']))
							{
									setcookie("ac_pagination_skip", 0);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
					
						
		
					try 
					{
						// CONDITIONS 
						$filter = ['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])];
						$options = [
									'projection' =>  [
														'advertisement_custom_multi' => 1,
														'icon' => 1
													 ],
								   ];
						//print_r($options);exit(0);			
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursor = $this->manager->executeQuery('dynamic_admin.advertisement_custom', $query);
						$cursor=$cursor->toArray();
						//print_r($cursor);exit(0);
						$adCData=json_decode(json_decode(json_encode($cursor),true)[0]["advertisement_custom_multi"],true);
						//print_r($adCData);exit(0);
						$ICONS_SET[]=json_decode(json_encode($cursor),true)[0]["icon"];
						foreach($adCData as $v)
						{
							$v=json_decode(json_encode($v),true);
							$ICONS_SET[]=$v['icon'];
						}
						$ICONS_SET=array_unique($ICONS_SET);
						//print_r($ICONS_SET);exit(0);
		
						
						//////PERFORM SORTINT //////////
							//print_r(Yii::app()->session['sort']);
							//$adCData['abc']['date']="";
							//print_r($adCData);exit(0);
							//$adCData = $this->manual_sort($adCData,Yii::app()->session['sort']['sort_cad_on'],0);
							$adCData = $this->manual_sort($adCData, $key = Yii::app()->session['sort']['sort_cad_on'],Yii::app()->session['sort']['sort_cad_op']);
							//echo json_encode($adCData);exit(0);
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
		
					
		
					
						
		if(isset($_GET['deleteAll']))
		{
					 
			//print_r(count($_GET));exit(0);
			// return if no id pass
			if(count($_GET)==1)
				return;
			
			$filter =array();
			$i=0;
			foreach($_GET as $key=>$val)
			{	
				//echo $i;
				if($i!=0)
				{
					
					  $filename = "images/AD/".$adCData[$key]['icon'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
						$filename = "images/AD/".$adCData[$key]['banner'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
					
					//print_r($adCData);echo "<br><br>";
						unset($adCData[$key]);
					//echo json_encode($adCData);exit(0);
						
						
					
					//echo $key."  /  ".new \MongoDB\BSON\ObjectID($key)."<br>";
					//$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($key);
				}	
				$i++;
			}
			
					try 
					{
						
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
						$bulk->update(
										['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])],
										['$set' => ['advertisement_custom_multi' => json_encode($adCData)]],
										['multi' => false]
									 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="d2";
						else
							Yii::app()->session['err']="d3";
						
						$this->redirect('acm');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					} 
			
		}
		
			
		
		if(isset($_POST['addTD']))
		{
			//print_r($_POST);
			//print_r($_FILES);exit(0);
			//echo count($_FILES["wimg"]["error"]);
			$i=0;
			foreach($_FILES["multi_banner"]["error"] as $err)
			{
										
				if ($err == 0)
				{		
						// banner move
						 $file_ext=pathinfo($_FILES["multi_banner"]["name"][$i], PATHINFO_EXTENSION);
						 $multi_banner="multi_banner".date('Ymdhis').rand(1000, 9999).".".$file_ext;
						 move_uploaded_file($_FILES["multi_banner"]["tmp_name"][$i],"images/AD/" . $multi_banner);
					
						if($_REQUEST['selectedFile']==''){
							// Icon move
							$file_ext=pathinfo($_FILES["multi_icon"]["name"][$i], PATHINFO_EXTENSION);
							$multi_icon="multi_icon".date('Ymdhis').rand(1000, 9999).".".$file_ext;
							move_uploaded_file($_FILES["multi_icon"]["tmp_name"][$i],"images/AD/" . $multi_icon);
						}
						
						//exit(0);
						
						if($_REQUEST['selectedFile']!='')
							$multi_icon=$_REQUEST['selectedFile'];
							
						
							try 
							{
								$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			
								//print_r($adCData);echo "<br><br>";
								$INDEX=count($adCData)==0?0:max(array_keys($adCData))+1;
								$adCData[$INDEX]["icon"]=$multi_icon;
								$adCData[$INDEX]["banner"]=$multi_banner;
								$adCData[$INDEX]["acid"]=Yii::app()->session['FR'];
								$adCData[$INDEX]["color"]=$_POST['clr'];
								$adCData[$INDEX]["ad_tag"]='';
								$adCData[$INDEX]["design_page"]=$_POST['link'];
								$adCData[$INDEX]["enable"]=1;
								$adCData[$INDEX]["date"]=date('Y-m-d h:i:s');
								//echo json_encode($adCData);exit(0);
								
								$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
								$bulk->update(
												['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])],
												['$set' => ['advertisement_custom_multi' => json_encode($adCData)]],
												['multi' => false]
											 );
								$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
									
								//var_dump($enb->getModifiedCount());exit(0);
								
								if($enb->getModifiedCount()>0)
									Yii::app()->session['err']="i2";
								else
									Yii::app()->session['err']="i3";
								
								
							} 
							catch (Exception $e)
							{
								echo $e;
								exit(0);
								Yii::app()->session['err']="i3";
							} 
							
				}
				$i++;
			}
			
			$adCData = $this->manual_sort($adCData, $key = Yii::app()->session['sort']['sort_cad_on'],Yii::app()->session['sort']['sort_cad_op']);
			
			$this->redirect('acm');	
		}
		
			//print_r($_FILES);exit(0);
			//print_r($_POST);
			//exit(0);
			
		if(isset($_POST['eid']))
		{
			//print_r($_FILES);//exit(0);
			//print_r($_POST);
			//exit(0);
			
			
			if($_FILES["multi_banner"]["error"]==0)
			{
				//print_r($_POST);
				//print_r($_FILES);
				//exit(0);
				
				 $filename = "images/AD/".$_REQUEST['oldbanner'];
						  if (file_exists($filename)) {
							unlink($filename);
							//echo 'File '.$filename.' has been deleted';
						  }
						  //exit(0);
				
				 $file_ext=pathinfo($_FILES["multi_banner"]["name"], PATHINFO_EXTENSION);
				 $multi_banner="multi_banner".date('Ymdhis').".".$file_ext;
				 move_uploaded_file($_FILES["multi_banner"]["tmp_name"],"images/AD/" . $multi_banner);
      		
				
							//print_r($adCData);echo "<br><br>";
								$adCData[$_POST['eid']]["banner"]=$multi_banner;
							//echo json_encode($adCData);exit(0);
			}
			
						
			if($_FILES["multi_icon"]["error"]==0)
			{
				//print_r($_POST);
				//print_r($_FILES);
				//exit(0);
				 
				//$filename = "images/AD/".$_REQUEST['oldicon'];
				//		  if (file_exists($filename)) {
				//			unlink($filename);
				//			//echo 'File '.$filename.' has been deleted';
				//		  }
				//		  //exit(0);
				
				 $file_ext=pathinfo($_FILES["multi_icon"]["name"], PATHINFO_EXTENSION);
				 $multi_icon="multi_icon".date('Ymdhis').".".$file_ext;
				 move_uploaded_file($_FILES["multi_icon"]["tmp_name"],"images/AD/" . $multi_icon);
      			
						//print_r($adCData);echo "<br><br>";
								$adCData[$_POST['eid']]["icon"]=$multi_icon;
						//echo json_encode($adCData);exit(0);
					
			}
			else if($_REQUEST['selectedFile']!='')
			{	$multi_icon=$_REQUEST['selectedFile'];
				 
				 //print_r($adCData);echo "<br><br>";
					$adCData[$_POST['eid']]["icon"]=$multi_icon;
				 //echo json_encode($adCData);exit(0);
			}
			
			
			echo "hello";
		
					try 
					{
						//print_r($adCData);echo "<br><br>";
							$adCData[$_POST['eid']]["design_page"]=$_POST['link'];
							$adCData[$_POST['eid']]["color"]=$_POST['clr'];
						//echo json_encode($adCData);exit(0);
						
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
								$bulk->update(
												['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])],
												['$set' => ['advertisement_custom_multi' => json_encode($adCData)]],
												['multi' => false]
											 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="e2";
						else
							Yii::app()->session['err']="e3";
						
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
					}
				
			unset($_POST);		
			echo "hiii ".$enb->getModifiedCount();			
			exit(0);
			//$this->redirect('acm');	
		}
		
		if(isset($_GET['did']))
		{
			//print_r($_GET);
			//exit(0);
			
					
					 $filename = "images/AD/".$_GET['b'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
						$filename = "images/AD/".$_GET['i'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
					
					
					
					try 
					{
						//print_r($adCData);echo "<br><br>";
							unset($adCData[$_GET['did']]);
						//echo json_encode($adCData);exit(0);
						$adCData=array_values($adCData);
						
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
						$bulk->update(
										['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])],
										['$set' => ['advertisement_custom_multi' => json_encode($adCData)]],
										['multi' => false]
									 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="d2";
						else
							Yii::app()->session['err']="d3";
						
						//$this->redirect('acm');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					} 
			exit(0);
		}
		
		if(isset($_REQUEST['lid']))
		{
			//print_r($_FILES);exit(0);
			//print_r($_POST);
			//exit(0);
			
					try 
					{
						//print_r($adCData);echo "<br><br>";
							if($_REQUEST['now']==0)
								$adCData[$_REQUEST['lid']]["enable"]=1;
							else
								$adCData[$_REQUEST['lid']]["enable"]=0;
						echo json_encode($_REQUEST['lid']);
						echo Yii::app()->session['FR'];
						echo json_encode($_REQUEST['now']);
						echo json_encode($adCData);
						echo json_encode($adCData[$_REQUEST['lid']]);//exit(0);
						
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
								$bulk->update(
												['_id' => new \MongoDB\BSON\ObjectId(Yii::app()->session['FR'])],
												['$set' => ['advertisement_custom_multi' => json_encode($adCData)]],
												['multi' => false]
											 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.advertisement_custom', $bulk);
						
						echo json_encode($enb->getModifiedCount());//exit(0);
						
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="e2";
						else
							Yii::app()->session['err']="e3";
						
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
					}
				
						
			exit(0);
			//$this->redirect('acm');	
		}
		
		
		
		if(isset($_COOKIE["LEVEL"])&&$_COOKIE["LEVEL"]!=2)
				setcookie("page_scroll2", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'acm?FR='.Yii::app()->session['FR'].'&title='.Yii::app()->session['title'].'&mysql_id='.Yii::app()->session['FR_mysql_id']);// last location
		setcookie("LEVEL", '2');
		
		////PAGINATION///// 				
			$adCData_w_pg=array_slice($adCData, $_COOKIE['ac_pagination_skip'], $_COOKIE['ac_pagination_dropdown'], true);
		//print_r($adCData_w_pg);exit(0);
						
		
		
		$this->render('customAd_multi',array('rw'=>$adCData_w_pg,'ICONS_SET'=>$ICONS_SET,'err'=>$err,'cnt'=>count($adCData)));
	}
	
	
	
	public function actionAdvertisecostomReport()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/acr');
			else	
				$this->redirect('sl');
		
			$err="";
			
				
			// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
	
			
			
		
		if(isset($_POST['addTD']))
		{
			//print_r($_POST);
			//print_r($_FILES);exit(0);
			//echo count($_FILES["wimg"]["error"]);
			$clr="";
			
				$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			
							try 
							{
								
								$bulk = new MongoDB\Driver\BulkWrite;
								$bulk->insert([
												'name' => $_REQUEST['apnm'],
												'package_name' => $_REQUEST['appnm'],
												'enable' => 1,
												'date' => date('Y-m-d')
											]);
								$Am = $this->manager->executeBulkWrite('a_test_gallery.app_master', $bulk, $writeConcern);
							
							
								// advertisement_custom DATA
								$filter = ['enable' => 1];
								$options = [];
											
								$query = new MongoDB\Driver\Query($filter, $options);
								$advertisement_custom = $this->manager->executeQuery('a_test_gallery.advertisement_custom', $query);
								$rw=$advertisement_custom->toArray();
								foreach($rw as $v)
								{
									$v=json_decode(json_encode($v),true);
									
									$bulk = new MongoDB\Driver\BulkWrite;
									$bulk->insert([
													'apid' => $Am,
													'cad_id' => $v['_id'] ['$oid'],
													'count' => 0,
													'date' => date('Y-m-d')
												]);
									$newCollection = $this->manager->executeBulkWrite('a_test_gallery.app_cad_status', $bulk, $writeConcern);
								}
							
							
								//var_dump($newCollection->getInsertedCount());exit(0);
								if($Am->getInsertedCount()>0)
									Yii::app()->session['err']="i2";
								else
									Yii::app()->session['err']="i3";
								
								
							} 
							catch (Exception $e)
							{
								echo $e;
								exit(0);
								Yii::app()->session['err']="i3";
							} 

			//exit(0);
			
		}
		
		
		
		
		if(isset($_POST['editST']))
		{
			//print_r($_POST);
			//print_r($_FILES);
			//exit(0);
			
				
					try 
					{
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
						$bulk->update(
										['_id' => new \MongoDB\BSON\ObjectID($_GET['eid'])],
										['$set' => [
													'name' => $_POST['apnm'],
													'package_name' => $_POST['appnm']
													]],
										['multi' => false]
									 );
						$enb = $this->manager->executeBulkWrite('a_test_gallery.app_master', $bulk);
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="e2";
						else
							Yii::app()->session['err']="e3";
						
						$this->redirect('acr');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					}
				
			
			
		}
		
		if(isset($_GET['did']))
		{
			//print_r($_GET);
			//exit(0);
				
			
					try 
					{
						// DELETE app_master
						$bulk = new MongoDB\Driver\BulkWrite;
						$bulk->delete(
									  ['_id' => new \MongoDB\BSON\ObjectID($_GET['did'])],
									  ['limit' => 0]
									 );
						$enb = $this->manager->executeBulkWrite('a_test_gallery.app_master', $bulk);
						
						// DELETE app_cad_status
						$bulk = new MongoDB\Driver\BulkWrite;
						$bulk->delete(
									  ['apid' => new \MongoDB\BSON\ObjectID($_GET['did'])],
									  ['limit' => 0]
									 );
						$enb = $this->manager->executeBulkWrite('a_test_gallery.app_cad_status', $bulk);
						Yii::app()->session['err']="d2";
						
						$this->redirect('acr');
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					} 

		}
		
		
	//if(isset($_GET['rt']))
	//		Yii::app()->session['rt']=$_GET['rt'];

	Yii::app()->session['from']=date('Y-m-d');
	Yii::app()->session['to']=date('Y-m-d');	
	//if(isset($_POST['rt']))
	//{
		//exit(0);
	///	Yii::app()->session['rt']=$_POST['rt'];
	//	Yii::app()->session['from']=$_POST['from'];
	//	Yii::app()->session['to']=$_POST['to'];
	//}		
			
	
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='acr')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'acr');// last location
		setcookie("LEVEL", '0');
		

					
					
					try 
					{
						// app_cad_status DATA
						$filter = [];
						$options = [];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$app_cad_status = $this->manager->executeQuery('a_test_gallery.app_cad_status', $query);
						$rwC=$app_cad_status->toArray();
						
						// app_master DATA
						$filter = [];
						$options = [];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$app_master = $this->manager->executeQuery('a_test_gallery.app_master', $query);
						$rwM=$app_master->toArray();
					
						// advertisement_custom DATA
						$filter = ['enable' => 1];
						$options = [];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$advertisement_custom = $this->manager->executeQuery('a_test_gallery.advertisement_custom', $query);
						$rwCAD=$advertisement_custom->toArray();
					
					
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
					
					
					
					
		$this->render('customADR',array('rw'=>$rwM,'rwCAD'=>$rwCAD,'err'=>$err,'cnt'=>count($rwM)));
	}
	
	
	

	
	public function actionFakeVideo()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/sw');
			else	
				$this->redirect('sl');
		
				
			
			$err="";
			//print_r($_GET);
			//exit(0);
			
			// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
	
		
		if(isset($_GET['deleteAll']))
		{
					 
			//print_r(count($_GET));exit(0);
			// return if no id pass
			if(count($_GET)==1)
				return;
			
			$filter =array();
			$i=0;
			foreach($_GET as $key=>$val)
			{	
				//echo $i;
				if($i!=0)
				{
					//echo $key."  /  ".new \MongoDB\BSON\ObjectID($key)."<br>";
					$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($key);
				}	
				$i++;
			}
			
			//echo $i;exit(0);
			//print_r($filter);
			//exit(0);
					try 
					{
						// CONDITIONS 
						$options = [
									'projection' =>  [
														'filename' => 1,
													 ],
									'sort' => ['date' => -1],
								   ];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursorDT = $this->manager->executeQuery('dynamic_admin.fake_video', $query);
						$cursorDTARR=$cursorDT->toArray();
						//print_r($cursorDTARR);exit(0);
						
						$bulk = new MongoDB\Driver\BulkWrite;
						foreach($cursorDTARR as $v){  
							$v=json_decode(json_encode($v),true);
							
							 $filename = "images/VIDEO/".$v['filename'];
							  if (file_exists($filename)) {
								unlink($filename);
								//echo 'File '.$filename.' has been deleted';
							  }
							  
							$bulk->delete(
										['_id' => new \MongoDB\BSON\ObjectID($v['_id'] ['$oid'])],
										['limit' => 0]
										);
						}
						$enb = $this->manager->executeBulkWrite('dynamic_admin.fake_video', $bulk);
						
						
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
			
		}
		
		
		if(isset($_POST['addTD']))
		{
			//print_r($_POST);
			//print_r($_FILES);exit(0);
			//echo count($_FILES["wimg"]["error"]);
			$clr="";
			
				$i=0;
				foreach($_FILES["tdimg"]["error"] as $err)
				{
					//echo $err;exit(0);
					if($err==0)
					{
						 $file_ext=pathinfo($_FILES["tdimg"]["name"][$i], PATHINFO_EXTENSION);
						 $fnmB="Video".date('Ymdhis').rand(1000, 9999).".".$file_ext;
						 move_uploaded_file($_FILES["tdimg"]["tmp_name"][$i],"images/VIDEO/" . $fnmB);
						
						//exit(0);
							
						$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
						try
						{
								$bulk = new MongoDB\Driver\BulkWrite;
								$newAdId = $bulk->insert([
												'filename' => $fnmB,
												'enable' => 0,
												'date' => date('Y-m-d h:i:s')
											 ]);
								$newCollection = $this->manager->executeBulkWrite('dynamic_admin.fake_video', $bulk, $writeConcern);
							
								
								//var_dump($newCollection->getInsertedCount());exit(0);
								if($newCollection->getInsertedCount()>0)
									Yii::app()->session['err']="i2";
								else
									Yii::app()->session['err']="i3";
								
								
						} 
						catch (Exception $e)
						{
							echo $e;
							exit(0);
							Yii::app()->session['err']="i3";
						
						}
					}
					else
						Yii::app()->session['err']="i3";
					
					$i++;
				}
			$this->redirect('fv');		
		}
		
			
		if(isset($_GET['did']))
		{
			//print_r($_GET);
			//exit(0);
			
					
					  $filename = "images/VIDEO/".$_GET['flnm'];
					  if (file_exists($filename)) {
						unlink($filename);
						//echo 'File '.$filename.' has been deleted';
					  }
					  //exit(0);
					
					try 
					{
						
						$bulk = new MongoDB\Driver\BulkWrite;
						$bulk->delete(
									  ['_id' => new \MongoDB\BSON\ObjectID($_GET['did'])],
									  ['limit' => 0]
									 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.fake_video', $bulk);
						
						Yii::app()->session['err']="d2";
						
						
						//$this->redirect('ac');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
		
					} 

		}
		
		
		if(isset($_GET['lid']))
		{
			//print_r($_GET);
			//exit(0);
				
					try 
					{
				
						if($_GET['now']==0)
						{
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_GET['lid'])],
											['$set' => [
														'enable' => 1
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.fake_video', $bulk);
										
							
						}else{
							
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($_GET['lid'])],
											['$set' => [
														'enable' => 0
													]],
											['multi' => false]
										);
							$enb = $this->manager->executeBulkWrite('dynamic_admin.fake_video', $bulk);
						
						}

				
						//$this->redirect('ac');
						
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
					} 

		}
		
			
		//print_r($_SESSION);exit(0);
		
			
	
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='ac')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'ac');// last location
		setcookie("LEVEL", '0');
		
					try 
					{  
						// STATUS FILTER
						$filter =array();
						
						
						if(isset($_GET['search']))
							Yii::app()->session['search_cad']=$_GET['type'];
						else if(!isset(Yii::app()->session['search_cad']))
							Yii::app()->session['search_cad']=2;
						
						if(Yii::app()->session['search_cad']==1)
							$filter['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$filter['enable'] = 0;
						
						
						
						//print_r($_SESSION);
						//print_r($filter);exit(0);
						
					////////////////////////SORTING ///////////////////////////
						
					/////////////////////PAGINATION DROPDOWN/////////////////
							if(isset($_GET['search'])&&Yii::app()->session['search_cad']!=$_GET['search'])
							{
								setcookie("ac_pagination_dropdown", 10);// RESET SCROLL POSITION
								setcookie("ac_pagination_page", '1');// RESET SCROLL POSITION
								setcookie("ac_pagination_skip", '0');// RESET SCROLL POSITION
											
							}
							if(isset($_GET['pagination_dropdown']))
							{
									setcookie("ac_pagination_dropdown", $_GET['pagination_dropdown']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(isset($_GET['skip']))
							{
								//print_r($_GET);
									setcookie("ac_pagination_skip", $_GET['skip']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(!isset($_COOKIE['ac_pagination_skip']))
							{
									setcookie("ac_pagination_skip", 0);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
					
							//print_r($_COOKIE);exit(0);
						
						$options = [
									'projection' =>  [
														'advertisement_custom_multi' => 0
													 ],
									'sort' => ['_id' => -1],
								   
									'limit' => $_COOKIE['ac_pagination_dropdown'],
									'skip' => $_COOKIE['ac_pagination_skip']
								   
								   ];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursorDT = $this->manager->executeQuery('dynamic_admin.fake_video', $query);
						$cursorDTARR=$cursorDT->toArray();
						
						
						if(Yii::app()->session['search_cad']==1)
							$filter1['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$filter1['enable'] = 0;
						else
						{
							$filter1['$or' ][]['enable'] = 0;
							$filter1['$or' ][]['enable'] = 1;
						}
						// CONDITIONS 
						$command = new MongoDB\Driver\Command(
										[
										  "count" => "fake_video",// table name
										  "query" => $filter1
										]);
						$cursor = $this->manager->executeCommand('dynamic_admin', $command);
						$result=json_decode(json_encode($cursor->toArray()),true);
						
						//print_r($result);exit(0);
						
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}


		
		
		$this->render('upload_video',array('rw'=>$cursorDTARR,'err'=>$err,'cnt'=>$result[0]['n']));
		//$this->render('customAD',array('rw'=>json_encode($rw),'err'=>$err,'cnt'=>count($cursorDTARR)));
	}
	
	
	public function actionAddnewadmin()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/SC');
			else	
				$this->redirect('sl');
		
			$err="";
			
			// CONNECTION TO MONGO
			//$manager = new MongoDB\Driver\Manager("");
			
		if(isset($_GET['generalSearch']))
		{
			
			Yii::app()->session['generalSearch']=$_GET['generalSearch'];
			echo Yii::app()->session['generalSearch'];
			exit(0);	
			//print_r(count($_GET));exit(0);
			
		}
		

		
		
		if(isset($_GET['deleteAll']))
		{
					 
			//print_r(count($_GET));exit(0);
			// return if no id pass
			if(count($_GET)==1)
				return;
			
			$i=0;
			$bulk = new MongoDB\Driver\BulkWrite;
			foreach($_GET as $key=>$val)
			{	
				//echo $i;
				if($i!=0)
				{
					//echo $key."  /  ".new \MongoDB\BSON\ObjectID($key)."<br>";
					$bulk->delete(
								   ['_id' => new \MongoDB\BSON\ObjectID($key)],
								   ['limit' => 0]
							      );
				}	
				$i++;
			}
			$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
			
			exit(0);
		}
		
			
		
		
		if(isset($_POST['addTD']))
		{
			//print_r($_POST);
			//exit(0);
			$clr="";
			
							// CONDITIONS 
							$filter = [];
							$options = [];
							// CONDITIONS 
							$command = new MongoDB\Driver\Command([
										'aggregate' => 'application',
										'pipeline' => [
											['$group' => ['_id' => null, 'p' => ['$max' => '$position']]],
										],
										//'query' => ['x' => ['$gt' => 1]],
										'cursor' => new stdClass,
									]);
							$cursor = $this->manager->executeCommand('dynamic_admin', $command);
							$rw1=json_decode(json_encode($cursor->toArray()),true);
							//print_r($rw1);exit(0);		
							if(isset($rw1[0]['p']))
								$pos=$rw1[0]['p']+1;
							else
								$pos=1;
					
							try 
							{
								$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			
								$bulk = new MongoDB\Driver\BulkWrite;
								$bulk->insert([
												'title' => $_REQUEST['tdnm'],
												'table_prefix' => str_replace(' ', '_', strtolower($_REQUEST['tdnm'])),
												'position' => $pos,
												'enable' => 0,
												'date' => date('Y-m-d h:i:s')
											 ]);
								$newCollection = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk, $writeConcern);
							
								//var_dump($newCollection->getInsertedCount());exit(0);
								if($newCollection->getInsertedCount()>0)
									Yii::app()->session['err']="i2";
								else
									Yii::app()->session['err']="i3";
							} 
							catch (Exception $e)
							{
								echo $e;
								exit(0);
								Yii::app()->session['err']="i3";
							} 
			$this->redirect('na');		
			//exit(0);
			
		}
		
		if(isset($_GET['did']))
		{
			//print_r($_GET);
			//exit(0);
			
			try 
			{
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->delete(
							  ['_id' => new \MongoDB\BSON\ObjectID($_GET['did'])],
							  ['limit' => 0]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				
				Yii::app()->session['err']="d2";
				
				//$this->redirect('na');
				
			} 
			catch (Exception $e)
			{
				
				echo $e;
				exit(0);
				Yii::app()->session['err']="d3";
		
			} 
			exit(0);
		}
		
		if(isset($_REQUEST['eid']))
		{
			//print_r($_REQUEST);
			//exit(0);
			
					$cnm=$_REQUEST['tdnm'];
					try 
					{
						$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
						$bulk->update(
										['_id' => new \MongoDB\BSON\ObjectID($_REQUEST['eid'])],
										['$set' => [
													'title' => $cnm
												   ]
										],
										['multi' => false]
									);
						$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
						if($enb->getModifiedCount()>0)
							Yii::app()->session['err']="e2";
						else
							Yii::app()->session['err']="e3";
						
						//$this->redirect('na');
						
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="d3";
					}
				
			exit(0);	
		}
		
		
		if(isset($_GET['lid']))
		{
			//print_r($_GET);
			//exit(0);
			
			$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
			
			try 
			{
				if($_GET['now']==0)
					$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectId($_GET['lid'])],
									['$set' => [
												'enable' => 1,
												'date' => date('Y-m-d h:i:s')
												]
									],
									['multi' => false]
								  );
				else
					$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectId($_GET['lid'])],
									['$set' => ['enable' => 0]],
									['multi' => false]
								 );
				
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				if($enb->getModifiedCount()>0)
					Yii::app()->session['err']="e2";
				else
					Yii::app()->session['err']="e3";	
			
				//$this->redirect('na');
				
			} 
			catch (Exception $e)
			{
				
				echo $e;
				exit(0);
			} 
			echo $enb->getModifiedCount();		
			exit(0);
		}
		
		if(isset($_GET['mid_fst']))
		{
			//print_r($_GET);
			//exit(0);
			 
		   try 
		   {
				// CONDITIONS 
				$filter = [];
				$options = [];
				// CONDITIONS 
				$command = new MongoDB\Driver\Command([
							'aggregate' => 'application',
							'pipeline' => [
								['$group' => ['_id' => null, 'p' => ['$min' => '$position']]],
							],
							//'query' => ['x' => ['$gt' => 1]],
							'cursor' => new stdClass,
						]);
				$cursor = $this->manager->executeCommand('dynamic_admin', $command);
				$rw1=json_decode(json_encode($cursor->toArray()),true);
				//print_r($rw1);exit(0);		
				if(isset($rw1[0]['p']))
					$pos=$rw1[0]['p']-1;
				else
					$pos=1;
			
				
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectId($_GET['mid_fst'])],
									['$set' => ['position' => $pos]],
									['multi' => false]
								  );
				
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				if($enb->getModifiedCount()>0)
					Yii::app()->session['err']="e2";
				else
					Yii::app()->session['err']="e3";

				setcookie("ac_pagination_skip", 0);
			   
				$this->redirect('na');
				
			} 
			catch (Exception $e)
			{
				
				echo $e;
				exit(0);
			}
		}
		
		if(isset($_GET['mid_lst']))
		{
			//print_r($_GET);
			//exit(0);
			 
		   try 
		   {
				// CONDITIONS 
				$filter = [];
				$options = [];
				// CONDITIONS 
				$command = new MongoDB\Driver\Command([
							'aggregate' => 'application',
							'pipeline' => [
								['$group' => ['_id' => null, 'p' => ['$max' => '$position']]],
							],
							//'query' => ['x' => ['$gt' => 1]],
							'cursor' => new stdClass,
						]);
				$cursor = $this->manager->executeCommand('dynamic_admin', $command);
				$rw1=json_decode(json_encode($cursor->toArray()),true);
				//print_r($rw1);exit(0);		
				if(isset($rw1[0]['p']))
					$pos=$rw1[0]['p']+1;
				else
					$pos=1;
			
				
				$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
				$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectId($_GET['mid_lst'])],
									['$set' => ['position' => $pos]],
									['multi' => false]
								  );
				
				$enb = $this->manager->executeBulkWrite('dynamic_admin.application', $bulk);
				if($enb->getModifiedCount()>0)
					Yii::app()->session['err']="e2";
				else
					Yii::app()->session['err']="e3";

				setcookie("ac_pagination_skip", 0);
			   
				$this->redirect('na');
				
			} 
			catch (Exception $e)
			{
				
				echo $e;
				exit(0);
			}
		}
		
			
		
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='na')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		setcookie("LAST_TOUR", 'na');// last location
		setcookie("LEVEL", '0');
		
		
					
					
					// DISPLAY DATA
					try 
					{
						////// STATUS FILTER////////////
						// CONDITIONS 
						$match =array();
						if(isset(Yii::app()->session['generalSearch'])&&Yii::app()->session['generalSearch']!='')
						{
							$match['title']['$regex']=Yii::app()->session['generalSearch'];
							$match['title']['$options']='-i';
						  //$match['title']['$regex']=Yii::app()->session['generalSearch'];
						}
						
						////////////staus/////////////
						if(isset($_GET['search']))
							Yii::app()->session['search_cad']=$_GET['type'];
						else if(!isset(Yii::app()->session['search_cad']))
							Yii::app()->session['search_cad']=2;
						
						if(Yii::app()->session['search_cad']==1)
							$match['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$match['enable'] = 0;
						
						
						/////////////////////PAGINATION DROPDOWN/////////////////
							if(isset($_GET['search'])&&Yii::app()->session['search_cad']!=$_GET['search'])
							{
								setcookie("ac_pagination_dropdown", 10);// RESET SCROLL POSITION
								setcookie("ac_pagination_page", '1');// RESET SCROLL POSITION
								setcookie("ac_pagination_skip", '0');// RESET SCROLL POSITION
											
							}
							if(isset($_GET['pagination_dropdown']))
							{
									setcookie("ac_pagination_dropdown", $_GET['pagination_dropdown']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(isset($_GET['skip']))
							{
								//print_r($_GET);
									setcookie("ac_pagination_skip", $_GET['skip']);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
							if(!isset($_COOKIE['ac_pagination_skip']))
							{
									setcookie("ac_pagination_skip", 0);// RESET SCROLL POSITION
									//print_r($_COOKIE);exit(0);
							}
					
							//print_r($_COOKIE);exit(0);
							$dd['aggregate']='application';
							$dd['cursor']=new stdClass;
								if(count($match)>0)
									$dd['pipeline'][0]['$match']=$match;
								$dd['pipeline'][]['$sort']['position']=1;
								$dd['pipeline'][]['$skip']=(int)$_COOKIE['ac_pagination_skip'];
								$dd['pipeline'][]['$limit']=(int)$_COOKIE['ac_pagination_dropdown'];
							//print_r($dd);exit(0);	
							
							$command = new MongoDB\Driver\Command($dd);
							$cursor = $this->manager->executeCommand('dynamic_admin', $command);
							$rw=json_decode(json_encode($cursor->toArray()),true);
							//print_r($rw[0]['category_data'][0]['title']);exit(0);
							//print_r($rw);exit(0);
						
						/////////GET COUNT///////////
						if(Yii::app()->session['search_cad']==1)
							$filter1['enable']= 1;
						else if(Yii::app()->session['search_cad']==0)
							$filter1['enable'] = 0;
						else
						{
							$filter1['$or' ][]['enable'] = 0;
							$filter1['$or' ][]['enable'] = 1;
						}
						
						if(isset(Yii::app()->session['generalSearch'])&&Yii::app()->session['generalSearch']!='')
						{
							$filter1['title']['$regex']=Yii::app()->session['generalSearch'];
							$filter1['title']['$options']='-i';
							//$match['title']['$regex']=Yii::app()->session['generalSearch'];
						}
						//print_r($filter1);exit(0);
						// CONDITIONS 
						$command = new MongoDB\Driver\Command(
										[
										  "count" => "application",// table name
										  "query" => $filter1
										]);
						$cursor = $this->manager->executeCommand('dynamic_admin', $command);
						$result=json_decode(json_encode($cursor->toArray()),true);
						//print_r($result);exit(0);
						
					} 
					catch (Exception $e)
					{
						//$transaction->rollBack();
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
					
					
		$this->render('addnewadmin',array('rw'=>$rw,'err'=>$err,'cnt'=>$result[0]['n'],'cnt_move'=>count($rw)));
	}
	

	public function actionVersion()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/sl');
			else	
				$this->redirect('sl');
		
			$err="";
		
		// CONNECTION TO MONGO
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
	
	
			
	
	
	
	
		if(!isset(Yii::app()->session['table']))
			Yii::app()->session['table']=1;
		else if(isset($_GET['table']))
			Yii::app()->session['table']=$_GET['table'];
		
		if(isset($_POST['note']))
		{
			//print_r($_POST);
			//exit(0);
			$version_note["content"]=addslashes($_POST['note_data']);			
			$version_note["last_updated"]=date('Y-m-d h:i:s');			
			try
			{
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectId($_REQUEST['noteid'])],
									['$set' => ['version_note' => json_encode($version_note)]],
									['multi' => false, 'upsert' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "i2");
					else
						setcookie("ERROR", "i3");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "i3");
			}	
			
		}
	
	
		if(isset($_POST['addvrs']))
		{
			//print_r($_POST);exit(0);
			//print_r(Yii::app()->session['ad_master']);exit(0);
			//json_decode(Yii::app()->session['ad_master'],true)
			
			
			
			$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			
			try
			{
				$enbl=0;
				if(isset($_POST['enbl']))
				{
					$enbl=1;
					$bulk = new MongoDB\Driver\BulkWrite;
					$bulk->update(
									['enabled' => 1],
									['$set' => ['enabled' => 0]],
									['multi' => true]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
				}	
				$frc=0;
				if(isset($_POST['frc']))
				{
					$frc=1;
					$bulk = new MongoDB\Driver\BulkWrite;
					$bulk->update(
									['is_force' => 1],
									['$set' => ['is_force' => 0]],
									['multi' => true]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
				}	
				$bulk = new MongoDB\Driver\BulkWrite;
				
				
				$new_v_id=$bulk->insert([
								'title' => $_POST['vnm'],
								'code' => (int)$_POST['vcode'],
								'features' => $_POST['feture'],
								'ad_master' => Yii::app()->session['was_ad_master'],
								'users' => 0,
								'enabled' => $enbl,
								'is_force' => $frc,
								'date' => date('Y-m-d h:i:s')
							 ]);
				$newCollection = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk, $writeConcern);
			
				//echo $new_v_id;
				
				$ar_ad_master=json_decode(Yii::app()->session['ad_master'],true);
				$i=0;
				while(isset($ar_ad_master[$i]))
				{
					
					$ar_ad_master[$i]['version_Id']="".$new_v_id;
					
					$j=0;
					while(isset($ar_ad_master[$i]['ad_chield'][$j]))
					{
						$ar_ad_master[$i]['ad_chield'][$j]['version_Id']="".$new_v_id;
					
						$j++;	
					}
					
					$i++;
				}
				
				//print_r($ar_ad_master);
				//echo json_encode($ar_ad_master);
				//exit(0);
					
				$bulk = new MongoDB\Driver\BulkWrite;
				$bulk->update(
								['_id' => new \MongoDB\BSON\ObjectID("".$new_v_id)],
								['$set' => ['ad_master' => json_encode($ar_ad_master)]],
								['multi' => true]
							 );
				$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
				
				
				
			
			
			
				//var_dump($newCollection->getInsertedCount());exit(0);
				if($newCollection->getInsertedCount()>0)
					setcookie("ERROR", "i2");
				else
					setcookie("ERROR", "i3");
				
				$this->redirect('sv');
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "i3");
		
			}					
				
			//exit(0);
			
		}
		
		
		
		if(isset($_POST['addtype']))
		{
			//print_r($_POST);exit(0);
			//print_r(Yii::app()->session['ad_master']);exit(0);
			//json_decode(Yii::app()->session['ad_master'],true)
			
			
			
			$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			
			try
			{
				$bulk = new MongoDB\Driver\BulkWrite;
					
				$bulk->insert([
								'title' => $_POST['adtp']
								//'code' => $_POST['vcode'],
								//'features' => $_POST['feture'],
								//'ad_master' => Yii::app()->session['was_ad_master'],
								//'users' => 0,
								//'enabled' => $enbl,
								//'is_force' => $frc,
								//'date' => date('Y-m-d h:i:s')
							 ]);
				$newCollection = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'ad_type', $bulk, $writeConcern);
			
				//echo $new_v_id;
				
				//var_dump($newCollection->getInsertedCount());exit(0);
				if($newCollection->getInsertedCount()>0)
					setcookie("ERROR", "i2");
				else
					setcookie("ERROR", "i3");
				
				$this->redirect('sv');
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "i3");
		
			}					
				
			//exit(0);
			
		}
		
		
		if(isset($_POST['addTitle']))
		{	
			//print_r($_POST);exit(0);
			//print_r(Yii::app()->session['ad_master']);exit(0);
			//json_decode(Yii::app()->session['ad_master'],true)
			try 
			{
				
					  $filter = [];
					  $options = [
									'sort' => ['code' => -1],
									 'limit' => 1,
								   ];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_del=$cursor->toArray();
					  //print_r(json_decode(json_encode($cursor_del[0]),true));exit(0);
					  //print_r(json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true));exit(0);
					  $ver=json_decode(json_encode($cursor_del[0]),true);	
					  $adm=json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true);
					  //echo count($adm);exit(0);
					  
					   if(isset($adm))
					   {
						  $INDEX=count($adm)==0?0:max(array_keys($adm))+1;
							$enbl=0;
							if(isset($_POST['enbl']))
							{
									$enbl=1;
							}
							$adm[$INDEX]["adm_name"]=$_POST['admnm'];
							$adm[$INDEX]["version_Id"]=$ver['_id']['$oid'];
							$adm[$INDEX]["count"]=$_POST['count'];
							$adm[$INDEX]["enable"]=$enbl;
							$adm[$INDEX]["adm_date"]=date('Y-m-d h:i:s');
							// CUSTOM
							$adm[$INDEX]["ad_chield"][0]["ad_token"]="CUSTOM";
							$adm[$INDEX]["ad_chield"][0]["ad_keyword"]="CUSTOM";
							$adm[$INDEX]["ad_chield"][0]["version_Id"]=$ver['_id']['$oid'];
							$adm[$INDEX]["ad_chield"][0]["enable"]=0;
							$adm[$INDEX]["ad_chield"][0]["adc_date"]=date('Y-m-d h:i:s');
							// ALTERNATIVE         
							$adm[$INDEX]["ad_chield"][1]["ad_token"]="ALTERNATIVE";
							$adm[$INDEX]["ad_chield"][1]["ad_keyword"]="ALTERNATIVE";
							$adm[$INDEX]["ad_chield"][1]["version_Id"]=$ver['_id']['$oid'];
							$adm[$INDEX]["ad_chield"][1]["enable"]=0;
							$adm[$INDEX]["ad_chield"][1]["adc_date"]=date('Y-m-d h:i:s');
						  
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($ver['_id']['$oid'])],
											['$set' => [
														'ad_master' => json_encode($adm),
													   ]],
											['multi' => false]
										 );
							$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
							
							
							if($enb->getModifiedCount()>0)
								setcookie("ERROR", "i2_title");
							else
								setcookie("ERROR", "i3_title");

						  
					   }
					  //print_r($adm);exit(0);
				$this->redirect('sv');
					
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "i3_title");
			}
			
		}
		
		
		
		if(isset($_POST['addMode']))
		{	
	
			//print_r(Yii::app()->session['adtitle_list_his']);
			//print_r($_POST);exit(0);
			//print_r(Yii::app()->session['ad_master']);exit(0);
			//json_decode(Yii::app()->session['ad_master'],true)
			try 
			{
				
					  $filter = [];
					  $options = [
									'sort' => ['code' => -1],
									 'limit' => 1,
								   ];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_del=$cursor->toArray();
					  //print_r(json_decode(json_encode($cursor_del[0]),true));exit(0);
					  //print_r(json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true));exit(0);
					  $ver=json_decode(json_encode($cursor_del[0]),true);	
					  $adm=json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true);
					  //echo count($adm);exit(0);
					 
					  
						foreach($adm as $key_ttl=>$adttl)
						{
							if(in_array($adttl['adm_name'], Yii::app()->session['adtitle_list_his']))
							{	
								$adchld=$adttl['ad_chield'];
								//print_r($adchld);echo "<br><br>";
								
								$INDEX=count($adchld)==0?0:max(array_keys($adchld))+1;
								// CUSTOM
								$adm[$key_ttl]["ad_chield"][$INDEX]["ad_token"]=$_POST['adcnm'];
								$adm[$key_ttl]["ad_chield"][$INDEX]["ad_keyword"]=$_POST['kw'];
								$adm[$key_ttl]["ad_chield"][$INDEX]["version_Id"]=$ver['_id']['$oid'];
								$adm[$key_ttl]["ad_chield"][$INDEX]["enable"]=0;
								$adm[$key_ttl]["ad_chield"][$INDEX]["adc_date"]=date('Y-m-d h:i:s');
							}	
						}
					 
							$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
							$bulk->update(
											['_id' => new \MongoDB\BSON\ObjectID($ver['_id']['$oid'])],
											['$set' => [
														'ad_master' => json_encode($adm),
													   ]],
											['multi' => false]
										 );
							$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
							if($enb->getModifiedCount()>0)
								setcookie("ERROR", "i2_title");
							else
								setcookie("ERROR", "i3_title");
					  //print_r($adm);exit(0);
				$this->redirect('sv');
					
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "i3_title");
			}
			
		}
		
		
		
		
			
		if(isset($_GET['did_ver']))
		{
			//print_r($_GET);
			//exit(0);
				
					try 
					{
							
						$bulk = new MongoDB\Driver\BulkWrite;
						$bulk->delete(
									  ['_id' => new \MongoDB\BSON\ObjectID($_GET['did_ver'])],
									  ['limit' => 0]
									 );
						$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
						
						setcookie("ERROR", "d2");
						//$this->redirect('sv');
					} 
					catch (Exception $e)
					{
						
						echo $e;
						exit(0);
						setcookie("ERROR", "d3");
					} 
				exit(0);
		}
		
			
		
		
		if(isset($_POST['eid']))
		{
			//print_r($_POST);
			//exit(0);
			try 
			{
				$enbl=0;
				if(isset($_POST['enbl']))
				{
					$enbl=1;
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									['enabled' => 1],
									['$set' => ['enabled' => 0]],
									['multi' => true]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
				}
				$frc=0;
				if(isset($_POST['frc']))
				{
					$frc=1;
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									['is_force' => 1],
									['$set' => ['is_force' => 0]],
									['multi' => true]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
				}
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectID($_POST['eid'])],
									['$set' => [
												'title' => $_POST['vnm_e'],
												'features' => $_POST['features_e'],
												'code' => (int)$_POST['code_e'],
												'enabled' => $enbl,
												'is_force' => $frc
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2");
					else
						setcookie("ERROR", "e3");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3");
			}
			exit(0);	
		}
		
		if(isset($_POST['note_e']))
		{
			//print_r($_POST);
			//exit(0);
			try 
			{
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									['_id' => new \MongoDB\BSON\ObjectID($_POST['eid_note'])],
									['$set' => [
												'version_note' => addslashes($_POST['note_e']),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2");
					else
						setcookie("ERROR", "e3");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3");
			}
			exit(0);	
		}
		
		
		if(isset($_GET['adtitle_del']))
		{
			//print_r($_GET);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_GET['ver'],
								];
					  $options = [];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_del=$cursor->toArray();
					//print_r(json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true);
					
					  foreach($adm as $key=>$val)
					  {
						  if($val['adm_name']==$_GET['did'])
						  {
							  unset($adm[$key]);
							  break;
						  }
					  }					  
						$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_GET['ver'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "d2_title");
					else
						setcookie("ERROR", "d3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "d3_title");
			}
			exit(0);
		}
		
		
		if(isset($_GET['admode_del']))
		{
			//print_r($_GET);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_GET['ver'],
								];
					  $options = [];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_del=$cursor->toArray();
					  //print_r(json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_del[0]),true)['ad_master'],true);
					
					  foreach($adm as $key_ttl=>$adttl)
					  {
						  if($adttl['adm_name']==$_GET['ad_ttl'])
						  {
							  
								$adchld=$adttl['ad_chield'];
								foreach($adchld as $key_mode=>$admode)
								{
									if($admode['ad_keyword']==$_GET['admode'])
									{
										unset($adchld[$key_mode]);
										$adchld=array_values($adchld);
										$adm[$key_ttl]["ad_chield"]=$adchld;
										break 2;
									}
								}
						  }
					  }					  
							
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_GET['ver'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "d2_title");
					else
						setcookie("ERROR", "d3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "d3_title");
			}
			exit(0);
		}
		
		
		if(isset($_GET['adtitle_enb']))
		{
			//print_r($_GET);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_GET['ver'],
								];
					  $options = [];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_enb=$cursor->toArray();
					//print_r(json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true);
					
					  foreach($adm as $key=>$val)
					  {
						  if($val['adm_name']==$_GET['lid_ttl'])
						  {
							  if($val['enable']==0)
								$adm[$key]['enable']=1;
							  else
								$adm[$key]['enable']=0;
								  
							  break;
						  }
					  }					  
						//$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_GET['ver'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2_title");
					else
						setcookie("ERROR", "e3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3_title");
			}
			exit(0);
		}
		
		if(isset($_POST['count_adt_e_m']))
		{
			//print_r($_POST);
			//print_r(Yii::app()->session['vlist_his']);
			//print_r(Yii::app()->session['admode_list_his']);
			//exit(0);
			$i=0;
			if(count(Yii::app()->session['vlist_his'])>0&&count(Yii::app()->session['adtitle_list_his'])>0)
			{
				foreach(Yii::app()->session['vlist_his'] as $key=>$val)
				{	
					$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($val);
					$i++;
				}
				$options = [];
							
				$query1 = new MongoDB\Driver\Query($filter, $options);
				$cursor1 = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query1);
				$cursor_multi_ver=$cursor1->toArray();
				//print_r($cursor_multi_ver);exit(0);
				foreach($cursor_multi_ver as $key_vr=>$vr)
				{
					$version=json_decode(json_encode($vr),true);
					  $adm=json_decode($version['ad_master'],true);
					  foreach($adm as $key_ttl=>$adttl)
					  {
					  	if(in_array($adttl['adm_name'], Yii::app()->session['adtitle_list_his']))
					  	{	
							$adm[$key_ttl]['count']=(int)$_POST['count_adt_e_m'];
					  	}	
					  }	
					  $bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					  $bulk->update(
									[
										'_id' => new \MongoDB\BSON\ObjectID($version['_id']['$oid']),
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]
									],
									['multi' => false]
								   );
					 $enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
			    }
			}
			else
			{
				echo "err";
				//echo "not working without version filter";
			}				
				
				
			
			
			
			exit(0);
		}
		
		
		
		
		if(isset($_GET['admode_enb']))
		{
			//print_r($_GET);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_GET['ver'],
								];
					  $options = [];
					  			
					  $query_enb = new MongoDB\Driver\Query($filter, $options);
					  $cursor_enb = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query_enb);
					  $cursor_enb=$cursor_enb->toArray();
					  //print_r($cursor_enb);exit(0);
					  //print_r(json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true);
					
					  foreach($adm as $key_ttl=>$adttl)
					  {
					  	if($adttl['adm_name']==$_GET['ad_ttl'])
					  	{	
							$adchld=$adttl['ad_chield'];
							foreach($adchld as $key_mode=>$admode)
							{
								if($admode['ad_keyword']==$_GET['admode'])
								{
									 if($admode['enable']==0||$admode['enable']==-1)
										$adm[$key_ttl]["ad_chield"][$key_mode]["enable"]=1;
									
									
								}
								else
									 if($admode['enable']!=-1)
										$adm[$key_ttl]["ad_chield"][$key_mode]["enable"]=0;
									
							}
					  		$adchld=$adttl['ad_chield'];
					  		//print_r($adchld);echo "<br><br>";
					  		break;
					  	}	
					  }
					 	
								  
						//$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_GET['ver'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2_title");
					else
						setcookie("ERROR", "e3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3_title");
			}
			exit(0);
		}
		
		
		if(isset($_GET['admode_block']))
		{
			//print_r($_GET);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_GET['ver'],
								];
					  $options = [];
					  			
					  $query_enb = new MongoDB\Driver\Query($filter, $options);
					  $cursor_enb = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query_enb);
					  $cursor_enb=$cursor_enb->toArray();
					  //print_r($cursor_enb);exit(0);
					  //print_r(json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true);
					
					  foreach($adm as $key_ttl=>$adttl)
					  {
					  	if($adttl['adm_name']==$_GET['ad_ttl'])
					  	{	
							$adchld=$adttl['ad_chield'];
							foreach($adchld as $key_mode=>$admode)
							{
								if($admode['ad_keyword']==$_GET['admode'])
								{
									if($admode['enable']==-1)
										$adm[$key_ttl]["ad_chield"][$key_mode]["enable"]=0;
									else
										$adm[$key_ttl]["ad_chield"][$key_mode]["enable"]=-1;
								}
							}
					  		$adchld=$adttl['ad_chield'];
					  		//print_r($adchld);echo "<br><br>";
					  		break;
					  	}	
					  }
					 	
								  
						//$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_GET['ver'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2_title");
					else
						setcookie("ERROR", "e3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3_title");
			}
			exit(0);
		}
		
		
		if(isset($_POST['eid_adttl']))
		{
			//print_r($_POST);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_POST['eid_adttl'],
								];
					  $options = [];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_enb=$cursor->toArray();
					//print_r(json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true);
					
					  foreach($adm as $key=>$val)
					  {
						  if($val['adm_name']==$_POST['adttl'])
						  {
							  $adm[$key]['count']=$_POST['count'];
								if(isset($_POST['enbl']))
								{
									$adm[$key]['enable']=1;
							 	}
								else
								{
									$adm[$key]['enable']=0;
								}
								  
							  break;
						  }
					  }					  
						//$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_POST['eid_adttl'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2_title");
					else
						setcookie("ERROR", "e3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3_title");
			}
			exit(0);
		}
		
		
		if(isset($_POST['eid_admode']))
		{
			//print_r($_POST);
			//exit(0);
			try 
			{
				
					  $filter = [
									'code' => (int)$_POST['eid_admode'],
								];
					  $options = [];
					  			
					  $query = new MongoDB\Driver\Query($filter, $options);
					  $cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
					  $cursor_enb=$cursor->toArray();
					//print_r(json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true));exit(0);
					
					  $adm=json_decode(json_decode(json_encode($cursor_enb[0]),true)['ad_master'],true);
					
					  foreach($adm as $key_ttl=>$adttl)
					  {
					  	if($adttl['adm_name']==$_POST['emode_adttl'])
					  	{	
							$adchld=$adttl['ad_chield'];
							foreach($adchld as $key_mode=>$admode)
							{
								if($admode['ad_keyword']==$_POST['kw'])
								{
									$adm[$key_ttl]["ad_chield"][$key_mode]["ad_token"]=$_POST['adcnm'];
									break 2;
								}
							}
					  	}	
					  }	
						
					

					  
						//$adm=array_values($adm);	
						//print_r($adm);exit(0);
				
					$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulk->update(
									[
										'code' => (int)$_POST['eid_admode'],
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]],
									['multi' => false]
								 );
					$enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
					
					if($enb->getModifiedCount()>0)
						setcookie("ERROR", "e2_title");
					else
						setcookie("ERROR", "e3_title");
			} 
			catch (Exception $e)
			{
				echo $e;
				exit(0);
				setcookie("ERROR", "e3_title");
			}
			exit(0);
		}
		
		
		if(isset($_POST['newid']))
		{
			//print_r($_POST);
			//print_r(Yii::app()->session['vlist_his']);
			//print_r(Yii::app()->session['admode_list_his']);
			//exit(0);
			$i=0;
			if(count(Yii::app()->session['vlist_his'])>0&&count(Yii::app()->session['adtitle_list_his'])>0&&count(Yii::app()->session['admode_list_his'])>0)
			{
				foreach(Yii::app()->session['vlist_his'] as $key=>$val)
				{	
					$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($val);
					$i++;
				}
				$options = [];
							
				$query1 = new MongoDB\Driver\Query($filter, $options);
				$cursor1 = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query1);
				$cursor_multi_ver=$cursor1->toArray();
				//print_r($cursor_multi_ver);exit(0);
				foreach($cursor_multi_ver as $key_vr=>$vr)
				{
					$version=json_decode(json_encode($vr),true);
					  $adm=json_decode($version['ad_master'],true);
					  foreach($adm as $key_ttl=>$adttl)
					  {
					  	if(in_array($adttl['adm_name'], Yii::app()->session['adtitle_list_his']))
					  	{	
							$adchld=$adttl['ad_chield'];
							foreach($adchld as $key_mode=>$admode)
							{
								if(in_array($admode['ad_keyword'], Yii::app()->session['admode_list_his']))
								{
									$adm[$key_ttl]["ad_chield"][$key_mode]["ad_token"]=$_POST['newid'];
								}
							 }
					  	}	
					  }	
					  $bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					  $bulk->update(
									[
										'_id' => new \MongoDB\BSON\ObjectID($version['_id']['$oid']),
									],
									['$set' => [
												'ad_master' => json_encode($adm),
											   ]
									],
									['multi' => false]
								   );
					 $enb = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $bulk);
					
			    }
			}
			else
			{
				echo "err";
				//echo "not working without version filter";
			}				
				
				
			
			
			
			exit(0);
		}
		
		
		
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='sv')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		if(isset($_COOKIE["LAST_TOUR"]) && strpos($_COOKIE["LAST_TOUR"], 'sv') !== false)
			setcookie("LEVEL", '1');// last location
		else
			setcookie("LEVEL", '0');// last location
		
		
		setcookie("LAST_TOUR", 'sv');// last location
		
		
		
					try 
					{
						//////////////////filters Table RESULT////////////
							// CONDITIONS
							$filter =array();
							if(!isset(Yii::app()->session['vlist_his']))
								Yii::app()->session['vlist_his']=array();						
							if(!isset(Yii::app()->session['adtype_list_his']))
								Yii::app()->session['adtype_list_his']=array();						
							if(!isset(Yii::app()->session['adtitle_list_his']))
								Yii::app()->session['adtitle_list_his']=array();						
							if(!isset(Yii::app()->session['admode_list_his']))
								Yii::app()->session['admode_list_his']=array();						
							
							// VERSION
							if(isset($_REQUEST['vlist']))
							{
								Yii::app()->session['vlist_his']=$_REQUEST['vlist'];
								
							}	
							if(isset($_REQUEST['reset_vlist']))
							{
								Yii::app()->session['vlist_his']=array();
							}
							//print_r(Yii::app()->session['vlist_his']);exit(0);
								$i=0;
								foreach(Yii::app()->session['vlist_his'] as $key=>$val)
								{	
										//echo $i;
										//echo $key."  /  ".new \MongoDB\BSON\ObjectID($key)."<br>";
										$filter['$or' ][]['_id']= new \MongoDB\BSON\ObjectID($val);
										
									$i++;
								}
							
							// ADTITLE
							if(isset($_REQUEST['adtitlelist']))
							{
								Yii::app()->session['adtitle_list_his']=$_REQUEST['adtitlelist'];
							}	
							if(isset($_REQUEST['reset_adtitlelist']))
							{
								Yii::app()->session['adtitle_list_his']=array();
							}
							
							// ADMODE
							if(isset($_REQUEST['admodelist']))
							{
								Yii::app()->session['admode_list_his']=$_REQUEST['admodelist'];
							}	
							if(isset($_REQUEST['reset_admodelist']))
							{
								Yii::app()->session['admode_list_his']=array();
							}
							
							
							//print_r($_REQUEST);exit(0);
								
								
							//print_r(Yii::app()->session['adtitle_list_his']);exit(0);
							
							
							//$filter = [];
							$options = [
										'sort' => ['code' => -1],
									   ];
										
							$query = new MongoDB\Driver\Query($filter, $options);
							$cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
							$cursor_table=$cursor->toArray();
							//print_r($cursor);exit(0);
							
							
							$ad_title_table=array();
							$ad_mode_table=array();
							$i=0;
							$j=0;
							foreach($cursor_table as $key=>$v)
							{
								$version=json_decode(json_encode($v),true)['title'];// VERSION TITLE
								$v=json_decode(json_decode(json_encode($v),true)['ad_master'],true);
								//print_r($v);exit(0);
								
								foreach($v as $title)
								{
									
									//print_r($title);exit(0);
									if(count(Yii::app()->session['adtitle_list_his'])>0 && in_array($title['adm_name'], Yii::app()->session['adtitle_list_his']))
									{
										$ad_title_table[$i]=$title;
										$ad_title_table[$i]['version']=$version;
										$v1=json_decode(json_encode($title['ad_chield']));
									}
									else if(count(Yii::app()->session['adtitle_list_his'])==0)
									{
										$ad_title_table[$i]=$title;
										$ad_title_table[$i]['version']=$version;
										$v1=json_decode(json_encode($title['ad_chield']));
									}
									
									//print_r($v1);exit(0);
									if(isset($v1))
									foreach($v1 as $adc)
									{
										$adc=json_decode(json_encode($adc),true);
										if(count(Yii::app()->session['admode_list_his'])>0 && in_array($adc['ad_keyword'], Yii::app()->session['admode_list_his']))
										{
											$ad_mode_table[$j]=$adc;
											$ad_mode_table[$j]['version']=$version;
											$ad_mode_table[$j]['version_adtitle']=$title['adm_name'];
										}
										else if(count(Yii::app()->session['admode_list_his'])==0)
										{
											$ad_mode_table[$j]=$adc;
											$ad_mode_table[$j]['version']=$version;
											$ad_mode_table[$j]['version_adtitle']=$title['adm_name'];
										}
										
										
									 $j++;
									}
									$v1=array();
									
								 $i++;
								}
							}
							//print_r(count(Yii::app()->session['adtitle_list_his']));exit(0);
							//print_r($ad_mode_table);exit(0);
							
							// CONDITIONS
							//print_r(Yii::app()->session['vlist_his']);exit(0);
							
							
							
						//////////////////filters Table RESULT end////////////
						
						
						
						
						//////////////////filters LIST////////////
						$filter = [];
						$options = [
									'sort' => ['code' => -1],
								   ];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'version_table', $query);
						$cursor=$cursor->toArray();
						//print_r($cursor);exit(0);
						
						$ad_title=array();
						$ad_mode=array();
						foreach($cursor as $key=>$v)
						{
							$v=json_decode(json_decode(json_encode($v),true)['ad_master'],true);
							//print_r($v);exit(0);
							
							foreach($v as $title)
							{
								$ad_title[]=$title['adm_name'];
								
								$v1=json_decode(json_encode($title['ad_chield']));
								//print_r($v1);exit(0);
								foreach($v1 as $adc)
								{
									$adc=json_decode(json_encode($adc),true);
									
									$ad_mode[]=$adc['ad_keyword'];
								}	
							}
						}
						$ad_title=array_unique($ad_title);
						//print_r($ad_title);exit(0);
						
						$ad_mode=array_unique($ad_mode);
						//print_r($ad_mode);exit(0);
						
						$query_ad_type = new MongoDB\Driver\Query([], []);
						$cursor_ad_type = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'ad_type', $query_ad_type);
						$ad_type=$cursor_ad_type->toArray();
						//print_r($ad_type);exit(0);
						
						
						//print_r(json_decode(json_encode($cursor),true)[0] ['ad_master'] );exit(0);
						//json_decode(json_decode(json_encode($cursor),true)[0]["was_ad_master"],true);
						if(isset(json_decode(json_encode($cursor),true)[0] ['ad_master']))
							Yii::app()->session['ad_master']=json_decode(json_encode($cursor),true)[0] ['ad_master'];
						else
							Yii::app()->session['ad_master']= json_encode(array());
						
						//print_r(Yii::app()->session['ad_master']);exit(0);
					} 
					catch (Exception $e)
					{
						//
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}
		
					//print_r($ad_mode_table);exit(0);
		
		$this->render('version',array('rw_f_vesion'=>$cursor,
									  'rw_f_adtitle'=>$ad_title,
									  'rw_f_ad_mode'=>$ad_mode,
									  'rw_f_ad_type'=>$ad_type,
									  'rw_t_vesion'=>$cursor_table,
									  'rw_t_adtitle'=>$ad_title_table,
									  'rw_t_ad_mode'=>$ad_mode_table,
									  'err'=>$err,
									  'cnt'=>count($cursor)
									  ));
	}

	
	public function actionPrivacyPolicy()
	{
			if(!isset(Yii::app()->session['id']))
			if($this->URL_request=='')
				$this->redirect('index.php/pp');
			else	
				$this->redirect('sl');
		
			$err="";
		
		// MOngodb Connection	
			// $manager = new MongoDB\Driver\Manager("mongodb://superAdmin:admin123@localhost:27017");
			$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
			$bulk = new MongoDB\Driver\BulkWrite;		
				
		if(isset($_POST['add']))
		{
			//print_r($_POST);
			
			//exit(0);
		
			
					try 
					{
						
						$bulk->update([], 
									  ['$set' => [
													'content' => addslashes($_POST['content']),
													'date' => date('Y-m-d h:i')
												 ]
									  ],
									  ['multi' => false, 'upsert' => true]
									  );
						$result = $this->manager->executeBulkWrite('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'privacypolicy', $bulk);
						// GET AFFECTED ROW COUNT
							//echo (count($bulk));// Affected rows
							//exit(0);			
						
						
						if(count($bulk))
							Yii::app()->session['err']="i2";
						else
							Yii::app()->session['err']="i3";	
					} 
					catch (Exception $e)
					{
						echo $e;
						exit(0);
						Yii::app()->session['err']="i3";
		
					} 

		}
		
		
		
		
		if(isset($_COOKIE["LAST_TOUR"])&&$_COOKIE["LAST_TOUR"]!='pp')
			setcookie("page_scroll", '0');// RESET SCROLL POSITION
		
		if(isset($_COOKIE["LAST_TOUR"]) && strpos($_COOKIE["LAST_TOUR"], 'pp') !== false)
			setcookie("LEVEL", '1');// last location
		else
			setcookie("LEVEL", '0');// last location
		
		
		setcookie("LAST_TOUR", 'pp');// last location
		
		
					try 
					{
						// CONDITIONS 
						$filter = [];
						$options = [];
									
						$query = new MongoDB\Driver\Query($filter, $options);
						$cursor = $this->manager->executeQuery('dynamic_admin.'.Yii::app()->session['dynamictable'].'_'.'privacypolicy', $query);
						$cursor=$cursor->toArray();
						$cursor=isset(json_decode(json_encode($cursor),true)[0]["content"])?json_decode(json_encode($cursor),true)[0]["content"]:"";
						//print_r($cursor);exit(0);
						//print_r(json_decode(json_encode($cursor),true)[0]["content"]);exit(0);
						//$adData=json_decode(json_decode(json_encode($cursor),true)[0]["was_ad_master"],true);
						
							
					
					
					} 
					catch (Exception $e)
					{
						//
						echo $e;
						exit(0);
					}
					catch (MongoDB\Driver\Exception\BulkWriteException $e) 
					{
						$result = $e->getWriteResult();
						// GET AFFECTED ROW COUNT
						var_dump($result->getInsertedCount());
					
						// Check if the write concern could not be fulfilled
						if ($writeConcernError = $result->getWriteConcernError()) {
							printf("%s (%d): %s\n",
								$writeConcernError->getMessage(),
								$writeConcernError->getCode(),
								var_export($writeConcernError->getInfo(), true)
							);
						}

						// Check if any write operations did not complete at all
						foreach ($result->getWriteErrors() as $writeError) {
							printf("Operation#%d: %s (%d)\n",
								$writeError->getIndex(),
								$writeError->getMessage(),
								$writeError->getCode()
							);
						}
					}
					catch (MongoDB\Driver\Exception\Exception $e) {
						printf("Other error: %s\n", $e->getMessage());
						exit;
					}					

					
		
		$this->render('privacypolicy',array('rw'=>$cursor,'err'=>$err));
		
	}


	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('sl');
	}


	
}