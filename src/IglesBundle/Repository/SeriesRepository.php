<?php

namespace IglesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SeriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SeriesRepository extends EntityRepository
{
	
	public function getSeries()
	{
		$query = $this->_em->createQuery(
    		'SELECT s
    		FROM IglesBundle:Series s
    		WHERE s.moderation = 1
    		ORDER BY s.nomSerie ASC' );
		
		return $query->getResult();
		
	}

	public function getSaisons()
	{
		$query = $this->_em->createQuery(
    		'SELECT s, e
    		FROM IglesBundle:Series s
    		INNER JOIN s.saisons e
    		ORDER BY e.numeroSaisons ASC' );
		
		return $query->getResult();
		
	}

<<<<<<< HEAD
	
=======
	public function search($like,$limit = 10){

		$query = $this->_em->createQuery(
			'SELECT s
			FROM IglesBundle:Series s
			WHERE s.nomSerie LIKE :like
			ORDER BY s.nomSerie ASC'
			)->setParameter(':like','%'.$like.'%')
			 ->setMaxResults($limit);

		return $query->getResult();
	}
>>>>>>> 820823dabc1065181088d15b8278f750013b7c6b
}

