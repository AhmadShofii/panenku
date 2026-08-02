import 'package:dio/dio.dart';
import '../constants/api_constant.dart';
import '../storage/token_storage.dart';

class ApiClient{

  static final Dio dio=Dio(
    BaseOptions(
      baseUrl:ApiConstant.baseUrl,
      connectTimeout:const Duration(seconds:10),
      receiveTimeout:const Duration(seconds:10),
      headers:{
        'Accept':'application/json',
        'Content-Type':'application/json',
      },
    ),
  );


  static Future<void> init() async{

    final token=await TokenStorage.getToken();

    if(token!=null && token.isNotEmpty){

      dio.options.headers['Authorization']=
          'Bearer $token';

    }

  }

}