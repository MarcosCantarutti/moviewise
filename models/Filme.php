<?php

class Filme
{
    public $id;
    public $titulo;
    public $diretor;
    public $descricao;
    public $ano_de_lancamento;
    public $usuario_id;
    public $imagem;
    public $nota_avaliacoes;
    public $count_avaliacoes;

    public static function make($item)
    {
        $filme = new self();
        $filme->id = $item['id'];
        $filme->titulo = $item['titulo'];
        $filme->diretor = $item['diretor'];
        $filme->imagem = $item['imagem'];
        $filme->descricao = $item['descricao'];
        $filme->ano_de_lancamento = $item['ano_de_lancamento'];
        $filme->usuario_id = $item['usuario_id'];
        $filme->nota_avaliacoes = $item['nota_avaliacoes'];
        $filme->count_avaliacoes = $item['count_avaliacoes'];
        return $filme;
    }

    public function query($where, $params)
    {

        $database = new DB(config('database'));

        if ($where) {
            $where = " where $where ";
        }

        $query = $database->query("SELECT 
                            f.id,
                            f.titulo, 
                            f.diretor, 
                            f.descricao, 
                            f.ano_de_lancamento,
                            f.imagem, 
                            ifnull(round(sum(a.nota)/5.0), 0) as nota_avaliacoes, 
                            ifnull(count(a.id),0) as count_avaliacoes 
                        from 
                            filmes f 
                        left join 
                            avaliacoes a on a.filme_id = f.id
                        $where 
                        group by 
                            f.id, f.titulo, f.diretor, f.descricao, f.ano_de_lancamento ", Filme::class, $params);

        return $query;
    }

    public static function get($id)
    {
        $filme = (new self)->query('f.id=:id', ['id' => $id])->fetch();

        return $filme;
    }

    public static function myMovies($usuario_id)
    {
        $myMovies = (new self)->query('f.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
        return $myMovies;
    }

    public static function all($filtro = '')
    {
        $allMovies = (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
        return $allMovies;
    }
}
