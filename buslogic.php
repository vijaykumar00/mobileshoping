<?php
include_once 'config.php';
class clscmp
{
    public $cmpcod,$cmpnam,$cmplogo;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inscmp('$this->cmpnam','$this->cmplogo')";
        $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else
       {
           $con->db_close();       
           return FALSE;
       }
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updcmp($this->cmpcod,'$this->cmpnam','$this->cmplogo')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delcmp($this->cmpcod)";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
        $con=new clscon();
       $link=$con->db_connect();
       $qry="call disp_rec()" ;
       $res=mysqli_query($link,$qry);
       $i=0;
       $ar= array();
       while($r=mysqli_fetch_array($res))
       {
           $ar[$i]=$r;
           $i++;
       }
       $con->db_close();
       return $ar; 
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findcmp($this->cmpcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0)
        {
          $r=mysqli_fetch_row($res);
          $this->cmpcod=$r[0];
          $this->cmpnam=$r[1];
          $this->cmplogo=$r[2];
        }
         $con->db_close();
    }  
}   

class clstec
{
    public $teccod,$tecnam;
    Public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call instec('$this->tecnam')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updtec($this->teccod'$this->tecnam)";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
   public function delete_rec()
   {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call deltec($this->teccod)";
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
            $con->db_close();
            return TRUE;  
       }
       else 
       {
           $con->db_close();
           return FALSE;
       }
   }
   public function disp_rec()
   {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call disptec()";
       $res=mysqli_query($link,$qry);
       $i=0;
       $ar=array(); //yhn par ye array kyu liya hai 
       while($r=mysqli_fetch_row($res))
       {
           $ar[$i]=$r;
           $i++;
       }
       $con->db_close();
       return $ar;
   }
   public function find_rec()
   {
     $con=new clscon();
     $link=$con->db_connect();
     $qry="call findtec($this->teccod)";//isme teccod hi kyu liya hai
     $res=mysqli_query($link,$qry);
     if(mysqli_num_fields($res)>0);//_num_fields or _num_rows me kya frk hai
     {
         $r=mysqli_fetch_row($res);
         $this->teccod=$r[0];
         $this->tecnam=$r[1];
     }
      $con->db_close();
   }
}

class clsfet
{
    public $fetcod,$fetnam,$fetdsc; 
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insfet('$this->fetnam','$this->fetdsc')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updfet($this->fetcod','$this->fetnam','$this->fetdsc')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delfet($this->fetcod)";
        $qry=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
       {
            $con->db_close();
            return TRUE;  
       }
       else 
       {
           $con->db_close();
           return FALSE;
       }
    }
    public function disp_rec()
    {
      $con=new clscon();
       $link=$con->db_connect();
       $qry="call dispfet()";
       $res=mysqli_query($link,$qry);
       $i=0;
       $ar=array(); //yhn par ye array kyu liya hai 
       while($r=mysqli_fetch_row($res))
       {
           $ar[$i]=$r;
           $i++;
       }
       $con->db_close();
       return $ar;  
    }
    public function find_rec()
   {
     $con=new clscon();
     $link=$con->db_connect();
     $qry="call findfet($this->fetcod)";//isme teccod hi kyu liya hai or parameters q nhi lete hai.
     $res=mysqli_query($link,$qry);
     if(mysqli_num_fields($res)>0);//_num_fields or _num_rows me kya frk hai
     {
         $r=mysqli_fetch_row($res);
         $this->fetcod=$r[0];
         $this->fetnam=$r[1];
         $this->fetdsc=$r[2];
     }
      $con->db_close();
   }
}

class clsmod
{
    public $modcod,$modnam,$modnum,$modcmpcod,$modteccod,$moddsc,$modprc,$modmanpiccod,$modavlsts;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
       echo  $qry="call insmod('$this->modnam','$this->modnum',$this->modcmpcod,$this->modteccod,'$this->moddsc','$this->modprc',$this->modmanpiccod,'$this->modavlsts')";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        } 
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updmodmanpic($this->modcod,$this->modmanpiccod)";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delmod($this->modcod)";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function srcmod($ccod,$tcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call srcmod($ccod,$tcod)";
        $res=mysqli_query($link,$qry)or die(mysqli_error($link));
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_array($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;  
    }
    public function srcbytec($tcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call srcbytec($tcod)";
        $res= mysqli_query($link, $qry);
        $ar=array();
        $i=0;
        while($r=mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function srcbycmp($cccod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call srcbytec($cccod)";
        $res= mysqli_query($link, $qry);
        $ar=array();
        $i=0;
        while($r=mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
     $con=new clscon();
     $link=$con->db_connect();
     $qry="call findmod($this->modcod)";//isme teccod hi kyu liya hai or parameters q nhi lete hai.
     $res=mysqli_query($link,$qry)or die(mysqli_error($link));
     if(mysqli_num_fields($res)>0)//_num_fields or _num_rows me kya frk hai
     {
         $r=mysqli_fetch_row($res);
         $this->modcod=$r[0];
         $this->modnam=$r[1];
         $this->modnum=$r[2];
         $this->modcmpcod=$r[3];
         $this->modteccod=$r[4];
         $this->moddsc=$r[5];
         $this->modprc=$r[6];
         $this->modmanpiccod=$r[7];
         $this->modavlsts=$r[8];
     }
      $con->db_close();  
    }
}

class clsmodpic
{
    public $modpiccod,$modpicmodcod,$modpicpic,$modpicdsc;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insmodpic($this->modpicmodcod,'$this->modpicpic','$this->modpicdsc')";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        } 
    }
    public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call updmodmanpic($this->modcod,$this->modmanpicmodcod)";
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delmodpic($this->modpiccod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec($mcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispmodpic($mcod)";
        $res=mysqli_query($link,$qry);//or die(mysqli_error($link));
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findmodpic($this->modpiccod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->modpiccod=$r[0];
         $this->modpicmodcod=$r[1];
         $this->modpicpic=$r[2];
         $this->modpicdsc=$r[3];
        }
    }
}

class clsmodfet
{
    public $modfetcod,$modfetmodcod,$modfetfetcod,$modfetdsc;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insmodfet($this->modfetmodcod,$this->modfetfetcod,'$this->modfetdsc')";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }   
    }
     public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call updmodfet($this->modfetcod,$this->modfetmodcod,$this->modfetfetcod,'$this->modfetdsc')";
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delmodfet($this->modfetcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec($mcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispmodfet('$mcod')";
        $res=mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findmodfet($this->modfetcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->modfetcod=$r[0];
         $this->modfetmodcod=$r[1];
         $this->modfetfetcod=$r[2];
         $this->modfetdsc=$r[3];
        }
    }
}

class clsnewrel
{
    public $newrelcod,$newrelmodcod,$newreldat;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insnewrel($this->newrelmodcod,'$this->newreldat')";
        $res= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }   
    }
     public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call updnewrel($this->newrelcod,$this->newrelmodcod,'$this->newreldat')";;
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delnewrel($this->newrelcod)";
        $res=mysqli_query($link,$res);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call disnewrel()";
        $res=mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findnewrel($this->newrelcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->newrelcod=$r[0];
         $this->newrelmodcod=$r[1];
         $this->newreldat=$r[2];
        }
    }
}

class clsdis
{
    public $discod,$dismodcod,$disper,$disofrstrdat,$disofrenddat;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insdis($this->dismodcod,$this->disper,'$this->disofrstrdat','$this->disofrenddat')";
        $con= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }   
    }
     public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call upddis($this->discod,$this->dismodcod,$this->disper,'$this->disofrstrdat','$this->disofrenddat')";
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call deldis($this->discod)";
        $res=mysqli_query($link,$res);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispdismod()";
        $res=mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call finddis($this->discod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->discod=$r[0];
         $this->dismodcod=$r[1];
         $this->disper=$r[2];
         $this->disofrstrdat=$r[3];
         $this->disofrenddat=$r[4];
        }
    }
}

class clsusr
{
    public $usrcod,$usreml,$usrpwd,$usrregdat,$usrrol;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insusr('$this->usreml','$this->usrpwd','$this->usrregdat','$this->usrrol')";
        $con= mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;  
        }   
    }
     public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call updusr($this->usrcod,'$this->usreml','$this->usrpwd','$this->usrregdat','$this->usrrol')";
       $res=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
           $con->db_close();
           return TRUE;
       }
       else 
        {
            $con->db_close();
            return FALSE;  
        }
    }
    public function delete_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call delusr($this->usrcod)";
        $res=mysqli_query($link,$res);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    public function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispusr()";
        $res=mysqli_query($link,$qry);
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($res))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;   
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findusr($this->usrcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->usrcod=$r[0];
         $this->usreml=$r[1];
         $this->usrpwd=$r[2];
         $this->usrregdat=$r[3];
         $this->usrrol=$r[4];
        }
    }
}

class clsord
{
    public $ordcod,$orddat,$ordusrcod,$orddeladd,$orddelphn,$ordsts;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_close();
        $qry="call insord('$this->orddat',$this->ordusrcod,'$this->orddeladd','$this->orddelphn','$this->ordsts')";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
           $con->db_close();
           return FALSE;
        }
    }
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updord($this->ordcod,'$this->orddat',$this->ordusrcod,'$this->orddeladd','$this->orddelphn','$this->ordsts')";
        $qry=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
           $con->db_close();
           return FALSE;
        }
    }
    public function delete_rec()
    {
     $con=new clscon();
     $link=$con->db_connect(); 
     $qry="call delord($this->ordcod)";
     if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
           $con->db_close();
           return FALSE;
        }
    }
    public function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispord()";
        $i=0;
        $ar=array();
        while($r= mysqli_fetch_row($link))
        {
            $ar[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call find($this->ordcod)";
        $qry=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0);
        {
         $r=mysqli_fetch_row($res);
         $this->ordcod=$r[0];
         $this->orddat=$r[1];
         $this->ordusrcod=$r[2];
         $this->orddeladd=$r[3];
         $this->orddelphn=$r[4];
         $this->ordsts=$r[5];
        }
    }
}

class clsorddet
{
    public $orddetcod,$orddetordcod,$orddetmodcod,$orddetqty;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insorddet($this->orddetordcod,$this->orddetmodcod,$this->orddetqty)";
        $qry=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
           $con->db_close();
           return TRUE; 
        }
        else 
        {
          $con->db_close();
          return FALSE;
        }
    }
    
    public function update_rec()
    {
       $con=new clscon();
       $link=$con->db_connect();
       $qry="call updorddet($this->orddetcod,$this->orddetordcod,$this->orddetmodcod,$this->orddetqty)";
       $qry=mysqli_query($link,$qry);
       if(mysqli_affected_rows($link)==1)
       {
         $con->db_close();
         return TRUE;
       }
       else 
       {
           $con->db_close();
           return FALSE;
       }
    }
    
    public function delete_rec()
    {
     $con=new clscon();
     $link=$con->db_connect();
     $qry="call delorddet($this->orddetcod)";
     $res=mysqli_query($link,$qry);
     if(mysqli_affected_rows($link)==1)
     {
         $con->db_close();
         return TRUE;
     }
     else 
     { 
         $con->db_close();
         return FALSE;
     }
    }
    
    public function disp_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call disporddet()";
        $i=0;
        $ar=array();
        while ($r=mysqli_fetch_row($link))
        {
            $ar[i]=$r;
            $i++;
        }
        $con->db_close();
        return $ar;
    }
    
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findorddet($this->orddetcod)";
        $res=mysqli_query($link,$qry);
        if(mysqli_num_fields($res)>0)
        {
            $r=mysqli_fetch_row($res);
            $this->orddetcod=$r[0];
            $this->orddetordcod=$r[1];
            $this->orddetmodcod=$r[2];
            $this->orddetqty=$r[3];
        }
    }
}
?>

