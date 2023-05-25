<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

trait BeasModel{
    
    public function __construct(){
        parent::__construct();
        $this->queryPage();
    }
    public  function queryPage()
    {
        Builder::macro('pages', function ($per_page) {
            $data =   $this->paginate($per_page);
            
            if(empty($data)){
                return [
                    "current_page" => 1,//页数
                    "last_page"=>1,//最后的页数
                    "total"=>0,//数据量
                    "data"=>[],
                ];
            }
        
            if(is_object($data)){
                $data = $data?->toArray();
            }
            
            if(is_array($data)){
                return [
                    "page"=>$data['current_page'],
                    "last_page"=>$data['last_page'],
                    "per_page"=>$data['per_page'],
                    "total"=>$data['total'],
                    "data"=>$data['data']
                ];
            }
          
            return $data;
        });
        $this->HasWhere();
    }
    /**
     * @param $with 
     * @param $where 
     * @param $type  
     * 关联查询
     */
    public function HasWhere(){
        Builder::macro('HasWhere', function (string $with,array $where=[],int $type = 1) {
            $time = date("Y-m-d H:i:s",time());
            try{
                if($type){
                    return   $this->whereHas($with,function($query)use($where){
                        $query->where($where);
                    });
                }else{
                    return   $this->orWhereHas($with,function($query)use($where){
                        $query->where($where);
                    });
                }
              
               
            }catch(\Exception $e){
                Log::debug('关联查询错误'.$time.'错误'.$e->getMessage().'行数'.$e->getLine().'文件'.$e->getFile());
            }
        });
    }
   /* [get_complete_sql description] 根据查询构造器给出完整的sql
@param Builder|\Framework\Model\Eloquent\Builder $builder
@return string
*/
// function get_complete_sql($builder)
// {
// $bindings = $builder->getBindings();
// KaTeX parse error: Undefined control sequence: \? at position 40: …ace_callback('/\̲?̲/', function (matches) use (KaTeX parse error: Expected 'EOF', got '&' at position 11: bindings, &̲i) {
// return “'” . addslashes(b i n d i n g s [ bindings[bindings[i++] ?? ‘’) . “'”;
// }, $builder->toSql());
// }


    
  
}
?>