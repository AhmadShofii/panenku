import 'package:dio/dio.dart';

import '../../core/api/api_client.dart';
import '../../core/constants/api_constant.dart';
import '../../core/storage/token_storage.dart';
import '../models/user_model.dart';


class AuthRepository {


  Future<UserModel?> login(
    String email,
    String password,
  ) async {


    try {

      final response = await ApiClient.dio.post(

        ApiConstant.login,

        data: {

          'email': email,

          'password': password,

        },

      );


      if(response.data['status'] == true){


        final token = response.data['token'];


        if(token != null && token.isNotEmpty){

          await TokenStorage.saveToken(
            token,
          );

        }


        return UserModel.fromJson(

          response.data['data'],

        );

      }


      throw Exception(

        response.data['message'] 
        ?? 
        'Login gagal'

      );


    } on DioException catch(e){


      throw Exception(

        e.response?.data['message']
        ??
        'Gagal terhubung ke server'

      );


    }

  }


}