<?php
/*
 **************************************************************************
 *                                                                        *
 *          General Purpose Hash Function Algorithms Library              *
 *                                                                        *
 * Author: Arash Partow - 2002                                            *
 * URL: http://www.partow.net                                             *
 * URL: http://www.partow.net/programming/hashfunctions/index.html        *
 *                                                                        *
 * Copyright notice:                                                      *
 * Free use of the General Purpose Hash Function Algorithms Library is    *
 * permitted under the guidelines and in accordance with the most current *
 * version of the Common Public License.                                  *
 * http://www.opensource.org/licenses/cpl1.0.php                          *
 *                                                                        *
 **************************************************************************
*/


class GeneralHashFunctionLibrary
{


   public function RSHash($str)
   {
      $b     = 378551;
      $a     = 63689;
      $hash  = 0;
      $len   = strlen ( $str );
      for($i = 0; $i < $len; $i++)
      {
         $hash = $hash * $a + ord( $str[$i] );
         $a    = $a * $b;
      }

      return $hash;
   }
   /* End Of RS Hash Function */


   public function JSHash($str)
   {
      $hash   = 1315423911;
      $len    = strlen ( $str );
      for($i = 0; $i < $len; $i++)
      {
         $hash ^= (($hash << 5) + ord( $str[$i] ) + ($hash >> 2));
      }

      return $hash;
   }
   /* End Of JS Hash Function */


   public function PJWHash($str)
   {
      $BitsInUnsignedInt = (4 * 8);
      $ThreeQuarters     = (($BitsInUnsignedInt  * 3) / 4);
      $OneEighth         = ($BitsInUnsignedInt / 8);
      $HighBits          = (0xFFFFFFFF) << ($BitsInUnsignedInt - $OneEighth);
      $hash              = 0;
      $test              = 0;
      $len               = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = ($hash << $OneEighth) + ord( $str[$i] );

         if(($test = $hash & $HighBits)  != 0)
         {
            $hash = (( $hash ^ ($test >> $ThreeQuarters)) & (~$HighBits));
         }
      }

      return $hash;
   }
   /* End Of  P. J. Weinberger Hash Function */


   public function ELFHash($str)
   {
      $hash = 0;
      $x    = 0;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = ($hash << 4) + ord( $str[$i] );

         if(($x = $hash & 0xF0000000) != 0)
         {
            $hash ^= ($x >> 24);
         }
         $hash &= ~$x;
      }

      return $hash;
   }
   /* End Of ELF Hash Function */


   public function BKDRHash($str)
   {
      $seed = 131; // 31 131 1313 13131 131313 etc..
      $hash = 0;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = ($hash * $seed) + ord( $str[$i] );
      }

      return $hash;
   }
   /* End Of BKDR Hash Function */


   public function SDBMHash($str)
   {
      $hash = 0;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = ord( $str[$i] ) + ($hash << 6) + ($hash << 16) - $hash;
      }

      return $hash;
   }
   /* End Of SDBM Hash Function */


   public function DJBHash($str)
   {
      $hash = 5381;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = (($hash << 5) + $hash) + ord( $str[$i] );
      }

      return $hash;
   }
   /* End Of DJB Hash Function */


   public function DEKHash($str)
   {
      $hash = $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = (($hash << 5) ^ ($hash >> 27)) ^ ord( $str[$i] );
      }

      return $hash;
   }
   /* End Of DEK Hash Function */


   public function BPHash($str)
   {
      $hash = 0;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash = $hash << 7 ^ ord( $str[$i] );
      }

      return $hash;
   }
   /* End Of BP Hash Function */


   public function FNVHash($str)
   {
      $fnv_prime = 0x811C9DC5;
      $hash = 0;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         $hash *= $fnv_prime;
         $hash ^= ord( $str[$i] );
      }

      return $hash;
   }
   /* End Of FNV Hash Function */


   public function APHash($str)
   {
      $hash = 0xAAAAAAAA;
      $len  = strlen ( $str );

      for($i = 0; $i < $len; $i++)
      {
         if (($i & 1) == 0)
         {
            $hash ^= (($hash << 7) ^ ord( $str[$i] ) * ($hash >> 3));
         }
         else
         {
            $hash ^= (~(($hash << 11) + ord( $str[$i] ) ^ ($hash >> 5)));
         }
      }

      return $hash;
   }
   /* End Of AP Hash Function */

}
